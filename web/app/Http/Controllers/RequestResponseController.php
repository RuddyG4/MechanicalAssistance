<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class RequestResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('requests.responses.index');
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
    public function show(string $id)
    {
        $response = Response::with('request')->find($id);
        return view('requests.responses.show', compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function acceptResponse($id)
    {
        $response = Response::find($id);
        $response->request->request_state = 'A';
        $response->response_state = 'A';
        $response->push();
        return redirect()->route('home');
    }
}
