<?php

namespace App\Http\Controllers\Api;

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

    public function login(AuthLoginRequest $request)
    {
        try {
            $data = $this->repository->login($request);
            $token = $data->createToken("auth_token")->plainTextToken;

            return response()->success([
                "token" => $token,
                "token_type" => "Bearer"
            ], "Success to Login!");
        } catch (\Exception $e) {
            return response()->error("Failed to Login!", $e->getCode());
        }
    }

    public function register(AuthRegisterRequest $request)
    {
        try {
            $data = $this->repository->register($request);
            $token = $data->createToken("auth_token")->plainTextToken;

            return response()->success([
                "token" => $token,
                "token_type" => "Bearer"
            ], "Success to Register!");
        } catch (\Exception $e) {
            return response()->error("Failed to Register!", $e->getCode());
        }
    }
}
