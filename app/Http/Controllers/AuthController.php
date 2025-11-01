<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
  public function showRegisterForm()
    {
        $role = DB::table('roles')->get();
        return view('auth.register', compact('role'));
    }


   public function register(Request $request)
    {
        
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'role_id'     => 'required|exists:roles,id', // Validate role exists
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role_id'  => $request->role_id, // Save role
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registered successfully!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard'); // ya jo bhi aapka route ho
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
