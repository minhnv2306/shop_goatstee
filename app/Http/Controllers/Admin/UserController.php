<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Repositories\Contracts\RoleInterfaceRepository;
use App\Repositories\Contracts\UserInterfaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(
        UserInterfaceRepository $userRepository,
        RoleInterfaceRepository $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $this->authorize('view', User::class);

        $attribute = [
            'id',
            'email',
            'role_id',
            'created_at',
        ];
        $roleAttr = [
            'id',
            'name',
        ];
        $users = $this->userRepository->getAll($attribute);
        $roles = $this->roleRepository->getAllForSite();

        return view('admin.user.index', compact('users', 'roles'));
    }

    public function store(RegisterUserRequest $request)
    {
        try {
            $data = $request->only([
                'email',
                'password',
                'role_id',
            ]);
            $data['active'] = User::ACTIVE;
            $this->userRepository->create($data);

            return redirect()->route('admin.users.index')
                ->with('message', trans('admin.user.success_add'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('admin.users.index')
                ->with('error', $ex->getMessage());
        }
    }

    public function checkLoginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['active'] = User::ACTIVE;
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error', trans('admin.error.login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', User::class);
        try {
            $data = $request->only(['role_id']);
            $this->userRepository->update($user, $data);

            return redirect()->route('admin.users.index')
                ->with('message', trans('admin.user.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('admin.users.index')
                ->with('error', $ex->getMessage());
        }
    }
}
