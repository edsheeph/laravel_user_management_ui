<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request) {
        $var = $request->all();
        $var['user'] = $this->user();

        return view('modules.admin.dashboard', $var);
    }
}
