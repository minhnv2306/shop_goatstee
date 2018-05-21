<?php

namespace App\Http\Controllers\Sites;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showAccount()
    {
        return view('sites.user.my-account');
    }

    public function show(User $user)
    {
        return view('sites.user.show', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $data = $request->only([
                'first_name',
                'last_name',
                'company',
                'phone',
                'address',
                'country_id',
                'city_id',
            ]);
            $this->userRepository->saveInfor($user, $data);

            return redirect()->back()->with('message', trans('sites.user.success_update'));
        } catch (Exception $ex) {
            return redirect()->back()->with('errors', $ex->getMessage());
        }
    }

    public function activeUser(Request $request)
    {
        $user = User::where('hash', $request->active)->first();
        if (!empty($user)) {
            $user->active = User::ACTIVE;
            $user->save();

            return view('sites.user.active-account');
        } else {
            abort(404);
        }
    }
}
