<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function show($id)
    {
        $workshop = Workshop::with('mechanics.user')->find($id);
        return view('workshops.show-as-customer', compact('workshop'));
    }
}
