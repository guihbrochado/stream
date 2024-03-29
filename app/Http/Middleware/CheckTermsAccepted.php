<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CheckTermsAccepted {

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $user = Auth::user();

        if ($user && ($user->role !== 'admin')) {

            $acceptance = DB::table('terms_acceptances')->where('user_id', $user->id)->first();

            if (!$acceptance) {
                // Substitua 'terms.accept' pela rota real para a página de aceite dos termos
                return redirect()->route('terms.index');
            }
        }

        return $next($request);
    }
}
