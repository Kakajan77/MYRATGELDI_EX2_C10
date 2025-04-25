<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    public function index()
    {
        $proposal = Proposal::all();
        return view('proposals.index', ['proposals' => $proposal]);

    }
}
