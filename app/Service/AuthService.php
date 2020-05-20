<?php

namespace App\Service;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    function Login($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Login Success!'
        ];

        $email = $data['email'];
        $password = $data['password'];

        try {
            if ((User::where('email', $email)->first()->role != 0) && Auth::attempt(['email' => $email, 'password' => $password], true)) {
                $res = (object)[
                    'code' => 200,
                    'message' => 'Login Success!'
                ];
            } else {
                $res = (object)[
                    'code' => 403,
                    'message' => 'Email or password is wrong!'
                ];
            }
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'Email or password is wrong!'
            ];
        }
        return $res;
    }

    function logout()
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Logout Success!'
        ];

        try {
            Auth::logout();
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'You are not logged in!'
            ];
        }
        return $res;
    }
}
