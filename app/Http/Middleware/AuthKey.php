<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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
        $url = config('app.api_url');
        $token = Session::get('token');
        if (empty($token)) {
            return redirect()->route('login');
        }

        $response = Http::withToken($token)->get($url . "/api/auth/user");
        $result = json_decode((string) $response->getBody(), true);
        if (empty($result) || empty($result['data'])) {
            return redirect()->route('login');
        }

        // Check token
        if ($token != $result['data']['user_session']['access_token']) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
