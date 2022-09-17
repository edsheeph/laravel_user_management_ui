<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function url() {
        return config('app.api_url');
    }

    public function user() {
        $token = Session::get('token');
        $response = Http::withToken($token)->get($this->url() . "/api/auth/user");
        $result = json_decode((string) $response->getBody(), true);
        return $result['data'];
    }
}
