<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFromRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_process(LoginFormRequest $request)
    {

        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();


        if(Hash::check($credentials['password'], $user['password'])){

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('profile');
            }else{
                return redirect()->route('register')->with('error', 'Login Failed');
            }
        }else{
            return redirect()->route('login')->with('error', 'Password is wrong');
        }

    }
    public function register()
    {
        return view('auth.register');
    }
    public function register_process(RegisterFromRequest $request)
    {
        try {

            $data_user = $request->all();

            $photo = $request->file('photo');
            $input['imagename'] = 'image_'. $data_user['username']. '.'. $photo->extension();
            $destinationPath = public_path('/uploads/files/');
            $photo = $photo->move($destinationPath, $input['imagename']);
            $data_user['photo']= $input['imagename'];

            if($photo) {

                $data_user['password'] = Hash::make($data_user['password']);
                User::create($data_user);
                return redirect()->route('register')->with('success', 'Register Success');
            }
            return redirect()->route('register')->with('error', 'Failed save data');
        } catch (Exception $e) {
            return redirect()->route('register')->with('error', 'Failed save data');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
