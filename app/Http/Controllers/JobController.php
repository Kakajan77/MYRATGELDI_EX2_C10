<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::all();
        return view('jobs.index', ['jobs' => $job]);

    }
}
