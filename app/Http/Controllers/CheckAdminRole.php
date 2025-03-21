<?php

namespace App\Http\Controllers;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        if ($user && $user->id === 1) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized, only admin access.'], 403);
    }
}