<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendWelcomeEmail;
use App\Repositories\UserRepository;
use App\Services\ResponseBuilderService;
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



}
