<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\Proposal;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index()
    {
        $freelancer = Freelancer::all();
        return view('freelancers.index', ['freelancers' => $freelancer]);

    }
}
