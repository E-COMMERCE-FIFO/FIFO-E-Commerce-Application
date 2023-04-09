<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index() {
        $data = [ 'time' => date('h:i a') ];
        return view('client-side.beranda', $data);
    }
}
