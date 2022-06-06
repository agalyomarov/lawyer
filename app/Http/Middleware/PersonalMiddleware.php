<?php

namespace App\Http\Middleware;

use App\Models\Personal;
use Closure;
use Illuminate\Http\Request;

class PersonalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $personal_id = session('personal_id');
        $personal = Personal::find($personal_id);
        if ($personal) {
            return $next($request);
        }
        return redirect()->route('login_personal');
        // dd($personal);
        // dd(session()->all());
    }
}
