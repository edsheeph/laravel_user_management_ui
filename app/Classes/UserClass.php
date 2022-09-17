<?php

namespace App\Classes;

use Session;
use Carbon\Carbon;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class UserClass
{
    public function profile() {
        try {
            $url = config('app.api_url');
            $token = Session::get('token');

            $response = Http::withToken($token)->get($url . "/api/auth/user");
            $result = json_decode((string) $response->getBody(), true);

            return $result['data'];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
