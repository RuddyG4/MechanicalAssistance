<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelRequest;
use App\Models\Users\Customer;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource for a specific customer.
     */
    public function indexByCustomer(Customer $customer)
    {
        $requests = $customer->requests()->with('customer')->get();
        return view('requests.index-by-customer', compact('requests'));
    }

    public function indexByWorkshop($workshop_id)
    {
        $requests = ModelRequest::whereHas('responses', function ($query) {
            $query->where('workshop_id', session('workshop_id'))
                ->where('response_state', 'A');
        })
            ->with('customer')
            ->get();
        return view('requests.index-by-workshop', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($requestId)
    {
        $request = ModelRequest::with(['vehicle', 'multimedia', 'responses.workshop'])->find($requestId);
        return view('requests.show', compact('request'));
    }

    public function showAsWorkshop($requestId)
    {
        $request = ModelRequest::with(['vehicle.brand', 'multimedia'])->find($requestId);
        return view('requests.show-as-workshop', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModelRequest $modelRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelRequest $request)
    {
        //
    }
}
