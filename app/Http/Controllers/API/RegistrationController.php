<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\User;

class RegistrationController extends Controller
{
    public function register(RegistrationRequest $request) {
        User::create($request->getAttributes())->sendEmailVerificationNotification();

        return $this->respondWithMessage('User successfully created');
    }
}

