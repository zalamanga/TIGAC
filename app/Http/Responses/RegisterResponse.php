<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $request->session()->forget('url.intended');

        return $request->wantsJson()
            ? new JsonResponse('', 201)
            : redirect('/');
    }
}
