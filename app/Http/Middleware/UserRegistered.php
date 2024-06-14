<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use Inertia\Inertia;

class UserRegistered
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->registered) {
            return $next($request);
        }


        if ($user) {
            if ($user->request) {
                $request->session()->flash('status', 'Hem rebut la teva sol·licitud d\'alta. Estàs en procés de validació.');
            }

            if ($user->deactivated) {
                $request->session()->flash('status', 'El teu compte ha estat donat de baixa. Si creus que això és un error, contacta amb l\'administrador.');
            }

            Auth::logout();
        }

        return redirect()->route('login');
    }
}
