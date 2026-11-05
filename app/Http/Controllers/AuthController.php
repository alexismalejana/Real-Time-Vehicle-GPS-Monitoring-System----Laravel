<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup()
    {
        return view('admin.auth.signup');
    }

    public function create(Request $request)
    {
        
        $request->validate([
            'name' => ['required','string','max:255','regex:/^[\pL]+(?:[\s\-][\pL]+)+$/u',],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:12',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.auth.login')->with('success','Thank you for signing up! You can login now!');

    }

    public function login(){
        return view('admin.auth.login');
    }

    
    public function insert(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active',
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()
                ->route('admin.auth.login')->with('error', 'Please enter valid credentials.')
                ->withInput($request->only('email'));
        }

        // Regenerate session after successful login
        $request->session()->regenerate();

        $user = Auth::user();

        // Store session version
        $request->session()->put(
            'session_version',
            $user->session_version
        );

        return redirect()->intended(route('admin.dashboard'))->with('success', 'Welcome!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.auth.login')->with('success','Than you for visiting!');
    }

    public function changepassword()
    {
        return view('admin.changepassword.changepassword');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|min:8|max:12',
        ]);

        $user = User::getSingle(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
            Auth::logoutOtherDevices($request->current_password);
        }
        else 
        {
           return back()->with('error','Password is incorrect.');
       }
    }
}
