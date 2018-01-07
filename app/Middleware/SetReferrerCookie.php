<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class Testing
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
		// check for url var 'ref'
		if ($request->query('ref')){
			// if cookie doesn't already exist
			if (!$request->hasCookie('ref')){
				// set cookie
				$cookie = Cookie::make('ref', $request->query('ref'), 1440);
				Cookie::queue($cookie);
			}
		}

		return $next($request);
	}
}
