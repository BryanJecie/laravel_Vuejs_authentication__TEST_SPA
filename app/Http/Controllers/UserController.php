<?php

namespace App\Http\Controllers;

use App\Services\Contracts\UserServiceInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $userService;


    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function getAuthenticatedUser(): JsonResponse
    {
        $result = $this->userService->getAuthenticatedUser();

        $users = User::all();
        $user = User::find($result['userId']);

        return response()->json([
            'result' => $result,
            'code' => $result['code'],
            'users' => $users,
            'user' =>  $user
        ]);
    }

    public function getUser($id)
    {
        // $result = $this->userService->getAuthenticatedUser();
        // $users = User::all();

        return response()->json('ssss');
    }
}
