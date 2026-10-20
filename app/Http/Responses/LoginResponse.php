<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $request->session()->forget('url.intended');

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect($request->user()->is_admin ? '/admin' : '/');
    }
}
