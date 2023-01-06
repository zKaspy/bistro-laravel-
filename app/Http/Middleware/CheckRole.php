<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();

        if (!$user->role) {
            return redirect('/');
        } 

        foreach ($roles as $role) {
            if ($user->role->name == $role) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
