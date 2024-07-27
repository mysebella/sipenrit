<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
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

            if ($user->role != 'admin') {
                return redirect(route('home'));
            }
        }
        return $next($request);
    }
}
