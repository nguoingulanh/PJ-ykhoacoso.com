<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Auth\LoginRequest;
use App\Service\AuthService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //

    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login()
    {
        return view('admin.page.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $res = $this->service->Login($request->all());
        NotificationResult($res);

        if ($res->code === 200)
            return redirect(route('admin.home'));
        return back();
    }

    public function logout()
    {
        $res = $this->service->logout();

        NotificationResult($res);

        return redirect(route('admin.login'));
    }
}
