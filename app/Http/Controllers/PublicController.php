<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getFront() {
        return view('front');
    }

    public function getPortfolio() {
        return view('front');
    }
}
