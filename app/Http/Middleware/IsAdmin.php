<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $isAdmin = Admin::where('email', $user->email)->first();

            if ($isAdmin) {
                return $next($request);
            }
        }

        return redirect('home'); // redirect ke halaman home jika user bukan admin
    }
}
