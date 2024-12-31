<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Handle requests to /dashboard
        return view('dashboard.index');
    }
}