<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $userAccount = $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required']
        ]);

        $userAccount['password'] = bcrypt($userAccount['password']);
        $user = User::create($userAccount);
        auth()->login($user);
        return redirect('/');
    }

    public function login(Request $request) {
        $userAccount = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->attempt(['name' => $userAccount['loginName'], 'password' => $userAccount['loginPassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
