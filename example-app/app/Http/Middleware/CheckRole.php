<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {

        $user = $request->user();

        if (! $user || ! in_array($user->role, $roles)) {
            return redirect()->route('landing');
        }

        return $next($request);

    }
}
