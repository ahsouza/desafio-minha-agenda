<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Api;

class VerificationController extends Controller
{
 
    public function __construct() {
        $this->middleware('auth:api')->except(['verify']);
    }

    /**
     * Verificando e-mail
     *
     * @param $user_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function verify($user_id, Request $request) {
        if (! $request->hasValidSignature()) {
            return $this->respondUnAuthorizedRequest(Api::INVALID_EMAIL_VERIFICATION_URL);
        }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->to('/');
    }

    /**
     * Reenviar link para verificação de e-mail
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resend() {
        if (auth()->user()->hasVerifiedEmail()) {
            return $this->respondBadRequest(Api::EMAIL_ALREADY_VERIFIED);
        }

        auth()->user()->sendEmailVerificationNotification();

        return $this->respondWithMessage("Link para verificação de e-mail foi enviado!");
    }
   
}
