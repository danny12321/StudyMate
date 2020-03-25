<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if ($request->user() && $request->user()->type != 'admin')
        // {
        // }
        // dd(Auth::user()->name);
        dd(
            auth()->id() ?? '?',
            Auth::id() ?? '?',
            $request->user()->id ?? '?',
            auth()->check(),
            get_class(auth()->guard())
        );
        // dd($request->user());
        // return new Response(view('dashboard.home'));
        return $next($request);
    }
}
