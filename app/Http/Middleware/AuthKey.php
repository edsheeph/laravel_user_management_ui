<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use App\Http\Controllers\Controller as Controller;

class AuthKey
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
        $token = Session::get('token');
        $response = Http::withToken($token)->get(Controller::url() . "/api/auth/user");
        $result = json_decode((string) $response->getBody(), true);

        // Get session data

        if (empty($token)) {
            return back();
        }

        return $next($request);
    }
}
