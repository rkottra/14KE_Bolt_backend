<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenRefresh
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->currentAccessToken()) {
            $token = $request->user()->currentAccessToken();
            $token->expires_at = now()->addMinutes(config('sanctum.expiration'));
            $token->save();
        }
        return $next($request);
    }
}
