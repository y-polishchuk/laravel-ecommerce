<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PayingCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && ! $request->user()->subscribed('plans')) {
            // This user is not a paying customer...
            return redirect('page.pricing');
        }
 
        return $next($request);
    }
}
