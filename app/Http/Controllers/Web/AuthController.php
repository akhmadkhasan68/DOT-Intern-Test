<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Repository\AuthRepository;

class AuthController extends Controller
{
    protected $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;    
    }

    public function login()
    {
        return view("auth.login");
    }

    public function attemptLogin(AuthLoginRequest $request)
    {
        try {
            $data = $this->repository->login($request);

            return response()->json([
                "error" => false,
                "data" => $data,
                "redirect" => route("students.index"),
                "message" => "Success to login"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "message" => "Failed to login"
            ], $e->getCode());
        }
    }

    public function register()
    {
        return view("auth.register");
    }

    public function attemptRegister(AuthRegisterRequest $request)
    {
        try {
            $data = $this->repository->register($request);

            return response()->json([
                "error" => false,
                "data" => $data,
                "redirect" => route("login"),
                "message" => "Success to register"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "message" => "Failed to register"
            ], $e->getCode());
        }
    }

    public function logout()
    {
        try {
            $this->repository->logout();

            return response()->json([
                "error" => false,
                "redirect" => route("login"),
                "message" => "Success to logout"
            ]);
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                "error" => true,
                "message" => "Failed to logout"
            ], $e->getCode());
        }
    }
}
