<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller {

    public function index() {
        return view('login.login');
    }

    public function registration() {
        return view('login.registration');
    }
    

    /**
     * @param Request $request
     * 
     * Validation login details
     * @return dashboard/login view
     */
    public function postLogin(Request $request) {

        request()->validate([
            'email' => 'required',
            'password' => 'required|min:2',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return view('login.dashboard');
        }

        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    

    /**
     * @param Request $request
     * 
     * redirect to dashboard
     */
    public function postRegistration(Request $request) {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        $data = $request->all();

        $this->create($data);

        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Check auth
     * 
     * @return redirect to dashboard/ login view
     */
    public function dashboard() {

        if (Auth::check()) {
            return view('dashboard');
        }
        return Redirect::to("login")->withSuccess('Enter user name and password');
    }

    
    /**
     * Create user account
     * 
     * @return User 
     */
    public function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
        ]);
    }
    

    /**
     * @return redirect to login view
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}
