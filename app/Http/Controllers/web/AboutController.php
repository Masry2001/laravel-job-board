<?php

namespace App\Http\Controllers\web;
use app\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('about', ['title' => 'About']);
    }
}
