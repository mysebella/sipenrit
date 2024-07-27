<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class isUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Cookie::has('uix')) {
            $user = User::where('nrp', Cookie::get('uix'))->first();
            if (!$user) {
                Cookie::queue(Cookie::forget('uix'));
                Cookie::queue(Cookie::forget('id'));
                return redirect(route('login.view'));
            }
        } else {
            return redirect(route('login.view'));
        }

        return $next($request);
    }
}
