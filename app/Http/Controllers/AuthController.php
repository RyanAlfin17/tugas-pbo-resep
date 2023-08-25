<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showlogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    // Cek apakah akun dengan email yang diberikan ada dalam database
    $account = Account::where('email', $credentials['email'])->first();

    if ($account && Auth::attempt($credentials)) {
        // Jika berhasil login, alihkan ke halaman yang diinginkan
        return redirect()->intended('/');
    } else {
        // Jika gagal login, alihkan kembali ke halaman login dengan pesan error
        return redirect()->route('showlogin')->with('error', 'Email or password is incorrect.');
    }
}




    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Create a new user
        // dd($data);
        User::create($data);
        // $user->name = $validatedData['name'];
        // $user->email = $validatedData['email'];
        // $user->password = Hash::make($validatedData['password']);
        // $user->save();

        // You can customize the response after successful registration
        return redirect()->route('showlogin')->with('success', 'Registration successful. Please log in.');
    }
}
