<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginPage(Request $request) {
        return view('auth.login');
    }

    public function registerPage(Request $request) {
        return view('auth.register');
    }

    public function loginApi(Request $request) {
        try {
            $response = Http::post($this->url() . "/api/auth/login", [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $result = json_decode((string) $response->getBody(), true);

            if (empty($result['data'])) {
                $request->session()->flash('notification',[
                    'message' => $result['message'],
                    'status' => 'danger',
                ]);
                return back();
            }

            Session::put("token", $result['data']['access_token']);

            return redirect()->route('admin');
        } catch (\Exception $e) {
            $request->session()->flash('notification',[
                'message' => 'Oops! Something went wrong.',
                'status' => 'danger',
            ]);
            return back()->withInput();
        }

    }

    public function registerApi(Request $request) {
        try {
            $response = Http::post($this->url() . "/api/auth/register", [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ]);

            $result = json_decode((string) $response->getBody(), true);

            if (empty($result['data'])) {
                $request->session()->flash('notification',[
                    'message' => $result['message'],
                    'status' => 'danger',
                ]);
                return back()->withInput();
            }

            $request->session()->flash('notification',[
                'message' => $result['message'],
                'status' => 'success',
            ]);
            return redirect()->route('login');
        } catch (\Exception $e) {
            $request->session()->flash('notification',[
                'message' => 'Oops! Something went wrong.',
                'status' => 'danger',
            ]);
            return back();
        }

    }

    public function logout(Request $request) {
        try {
            $token = Session::get('token');

            $response = Http::withToken($token)->get($this->url() . "/api/auth/logout");

            $result = json_decode((string) $response->getBody(), true);

            Session::put("token", "");

            return redirect()->route('login');
        } catch (\Exception $e) {
            $request->session()->flash('notification',[
                'message' => 'Oops! Something went wrong.',
                'status' => 'danger',
            ]);
            return back();
        }
    }
}
