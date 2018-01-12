<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = User::create($request->all());

        Mail::to(env('REGISTRATION_MAIL_NOTIFY', 'george@vasilakos.com'))->send(new UserRegistration($user));
        return $user;
    }
}
