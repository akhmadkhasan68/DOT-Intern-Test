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

            return response()->json([
                "error" => false,
                "data" => [
                    "token" => $token,
                    "token_type" => "Bearer"
                ],
                "message" => "Success to login"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => true,
                "message" => "Failed to login"
            ], $e->getCode());
        }
    }

    public function register(AuthRegisterRequest $request)
    {
        try {
            $data = $this->repository->register($request);
            $token = $data->createToken("auth_token")->plainTextToken;

            return response()->json([
                "error" => false,
                "data" => [
                    "token" => $token,
                    "token_type" => "Bearer"
                ],
                "message" => "Success to register"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => true,
                "message" => "Failed to register"
            ], $e->getCode());
        }
    }
}
