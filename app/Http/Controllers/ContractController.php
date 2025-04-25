<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contract = Contract::all();
        return view('contracts.index', ['contracts' => $contract]);

    }
}
