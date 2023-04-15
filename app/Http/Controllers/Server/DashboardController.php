<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('server-side.dashboard');
    }

    public function datatables()
    {
        return view('server-side.datatables');
    }

    public function form()
    {
        return view('server-side.form');
    }
}
