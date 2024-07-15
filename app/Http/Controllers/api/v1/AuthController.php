<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendWelcomeEmail;
use App\Repositories\UserRepository;
use App\Services\ResponseBuilderService;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function register(RegisterRequest $request,UserRepository $userRepository)
    {
        $user = $userRepository->create($request->validated());
        $token = JWTAuth::fromUser($user);
        SendWelcomeEmail::dispatch($user);
        return ResponseBuilderService::sendSuccessOrFail('true',self::SUCCESS_OPERATION,null,$token);
    }

    public function login(LoginRequest $request,UserRepository $userRepository)
    {
        $credentials = $request->validated();
        $user = $userRepository->findByEmail($credentials['email']);
        if ($user && !Hash::check($credentials['password'], $user->password)) {
            return ResponseBuilderService::sendSuccessOrFail('false', self::WRONG_PASSWORD, null, null);
        }
        $token = JWTAuth::fromUser($user);
        return ResponseBuilderService::sendSuccessOrFail('true', self::SUCCESS_OPERATION, null, $token);
    }



}
