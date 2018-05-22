<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view', User::class);

        return view('admin.user.index');
    }

    public function checkLoginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role_id'] = User::ROLE_ADMIN;
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
}
