<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function account()
    {
        $user = Auth::user();

        return view('user.account', compact('user'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/rejestracja')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->second_name = $request->input('second_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/logowanie')->with('success', $user);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role =='user') {
            return redirect()->intended('/');
            }
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin');
            }
        }

        return redirect('/logowanie');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
                'max:255',
            ],
            'address' => [
                'required',
                'string',
                Rule::notIn(['Proszę uzupełnić']),
            ],
            'phone_number' => ['required', 'regex:/^[0-9]{9}$/'],
        ]);

        if ($validator->fails()) {
            return redirect('/konto')
                ->withErrors($validator)
                ->withInput();
        }

        $user->first_name = $request->input('first_name');
        $user->second_name = $request->input('second_name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');

        $user->save();

        return redirect('/konto')->with('success', 'Dane zostały zaktualizowane pomyślnie.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/logowanie');
    }
}
