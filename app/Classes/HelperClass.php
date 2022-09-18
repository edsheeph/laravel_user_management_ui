<?php

namespace App\Classes;

use Session;
use Carbon\Carbon;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class HelperClass
{
    public function user() {
        try {
            $url = config('app.api_url');
            $token = Session::get('token');

            $response = Http::withHeaders([
                'X-First' => 'foo',
                'X-Second' => 'bar'
            ])
            ->withToken($token)->get($url . "/api/auth/user");

            $result = json_decode((string) $response->getBody(), true);

            return $result['data'];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
