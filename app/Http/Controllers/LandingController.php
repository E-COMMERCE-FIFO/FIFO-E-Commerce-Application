<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $data = [ 'time' => date('h:i a') ];
        return view('client-side.beranda', $data);
    }
}
