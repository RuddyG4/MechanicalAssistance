<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $requests = ModelsRequest::where('customer_id', auth()->user()->id)->with('vehicle')->get();
        return view('front.customer-home', compact('requests'));
    }
}