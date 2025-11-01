<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm(){

          if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }
   
        return view('admin-panel.login');
    }

    public function login(Request $request)
    {



        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

   public function dashboard()
{
    return view('admin-panel.dashboard')->with('user', Auth::user());;
}

}

