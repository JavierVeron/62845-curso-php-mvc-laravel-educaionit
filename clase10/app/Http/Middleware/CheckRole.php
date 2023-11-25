<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        /* if ($request->input('token') !== 'qwerty') {
            return redirect('/');
        } */

        if ($request->user()->role != $role) {
            return redirect('/');
        }
        
        return $next($request);
    }

    public function terminate($request, $response) {
        DB::table('sessions')->insert(['name' => $request->user()->name, 'date' => date("Y-m-d H:i:s")]);
    }
}
