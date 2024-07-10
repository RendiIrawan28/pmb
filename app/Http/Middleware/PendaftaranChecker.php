<?php

namespace App\Http\Middleware;

use App\Models\Pendaftaran;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PendaftaranChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $pendaftaran = Pendaftaran::where('id', $user->id)->first();

            if ($pendaftaran) {
                return redirect()->route('status-pendaftaran')->with('error', 'Anda sudah mendaftar!');
            }
        }
        return $next($request);
    }
}
