<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class CheckToken
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
        $request->validate([
            "token" => ["required", "string", "min:32", "max:32"]
        ]);

        $user = User::where("token", "=", $request->token)->first();

        if($user)
        {
            return $next($request);
        }
        else
        {
            return Response(false, 404);
        }
    }
}
