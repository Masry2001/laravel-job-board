<?php

namespace App\Http\Controllers\web;
use app\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    //
    function index()
    {

        $jobs = Job::all();
        return view('job/index', compact('jobs'));
    }
}
