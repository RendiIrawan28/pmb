<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $id_role)
    {
        // // Ambil user yang sedang login
        $user = Auth::user();

        // // Cek apakah role user sama dengan role yang diizinkan
        if ($user->id_role == (int) $id_role) {
            return $next($request); 
        }
        else{
            return redirect()->route('403')->with('error', 'Anda tidak memiliki akses ke');
        }

        // abort(403,'unaut');
    }
}
