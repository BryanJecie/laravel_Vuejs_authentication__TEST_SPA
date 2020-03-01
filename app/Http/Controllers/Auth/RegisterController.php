<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegistrationRequest;
use App\Http\Controllers\Controller;
use App\Services\Contracts\RegistrationServiceInterface;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegistrationServiceInterface $service)
    {
        $this->service = $service;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function register(RegistrationRequest $request): JsonResponse
    {
        $result = $this->service->register($request);

        $user = User::find($result['userId']);
        $user->name = $request->user['fullName'];
        $user->save();

        return response()->json($result, $result['code']);
    }


    public function update(Request $request)
    {
        return response()->json($request->all());
    }
}
