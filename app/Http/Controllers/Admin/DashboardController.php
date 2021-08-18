<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index() {
        $setting = Setting::first();
        return view('dashboard', compact('setting'));
    }
}
