<?php
namespace App\Repository;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository{
    protected $model;

    public function __construct()
    {
        $this->model = new User();    
    }

    public function login(AuthLoginRequest $request) 
    {
        try {
            $userExist = $this->model->where("username", $request->username)->orWhere("email", $request->username)->firstOrFail();
            $usernameOrEmailField = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $login = Auth::attempt([
                $usernameOrEmailField => $request->username,
                "password" => $request->password
            ]);

            if(!$login) throw new Exception("Invalid login details", 401);

            return $userExist;
        } catch(ModelNotFoundException $e) {
            throw new Exception("User not found!", 404);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function register(AuthRegisterRequest $request)
    {
        try {
            $request->merge([
                "password" => Hash::make($request->password)
            ]);

            $data = $this->model->create($request->toArray());

            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function logout()
    {
        try {
            return Auth::logout();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}