<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Repositories\Contracts\RoleInterfaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleInterfaceRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $this->authorize('view', Role::class);

        $attribute = [
            'id',
            'name',
        ];
        $roles = $this->roleRepository->getAll($attribute);
        $objects = Role::getObjects();

        // Get operation with object of role
        foreach ($objects as $key => $value) {
            foreach ($roles as $role) {
                $operation = Permission::where([
                    ['object_id', $key],
                    ['role_id', $role->id],
                ])->first();
                $role[$value] = json_decode($operation->operation);
            }
        }
        $data = compact('roles', 'objects');

        return view('admin.role.index', $data);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Role::class);

        DB::beginTransaction();
        try {
            $role = Role::create([
                'name' => $request->name,
            ]);
            foreach ($request->roles as $key => $value) {
                $permission = Permission::create([
                    'object_id' => $key,
                    'role_id' => $role->id,
                    'operation' => json_encode($value)
                ]);
            }
            DB::commit();
            return redirect()->route('roles.index')
                ->with('message', trans('admin.roles.success_add'));
        } catch (Exception $ex) {
            DB::rollback();
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('roles.index')
                ->with('error', $ex->getMessage());
        }
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update', Role::class);

        DB::beginTransaction();
        try {
            $keyRequets = array_keys($request->roles);
            $keyObject = array_keys(Role::getObjects());
            foreach ($keyObject as $key) {
                if (array_search($key, $keyRequets) === false) {
                    $permission = Permission::where([
                        ['object_id', $key],
                        ['role_id', $role->id],
                    ]);

                    $permission->update([
                        'operation' => '[]',
                    ]);
                } else {
                    $permission = Permission::where([
                        ['object_id', $key],
                        ['role_id', $role->id],
                    ]);

                    $permission->update([
                        'operation' => json_encode($request->roles[$key]),
                    ]);
                }
            }
            DB::commit();

            return redirect()->route('roles.index')
                ->with('message', trans('admin.roles.success_update'));
        } catch (Exception $ex) {
            DB::rollback();
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->route('roles.index')
                ->with('error', $ex->getMessage());
        }
    }
}
