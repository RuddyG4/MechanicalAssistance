<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Response;
use App\Models\Users\Mechanic;
use Illuminate\Http\Request;

class WorkshopResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    
    public function show($workshop_id, $response_id)
    {
        $response = Response::find($response_id);
        $mechanics = Mechanic::with('user')->where('workshop_id', $workshop_id)->get();
        return view('requests.responses.show-as-workshop', compact('response', 'mechanics'));
    }

    public function update(Request $request, $workshop_id, Response $response)
    {
        if ($response->response_state == 'Accepted') {
            $response->response_state = 'I';
        } elseif ($response->response_state == 'In comming') {
            $datos = $request->validate([
                'mechanic_id' => 'required|integer|gt:0',
                'service_description' => 'required',
                'service_price' => 'required',
            ]);
            $req = $response->request()->first();
            $order = Order::create([
                'order_date' => now(),
                'customer_id' => $req->customer_id,
                'workshop_id' => $workshop_id,
                'request_id' => $req->id,
            ]);

            $detail = OrderDetail::create([
                'service_description' => $datos['service_description'],
                'service_price' => $datos['service_price'],
                'order_id' => $order->id,
                'mechanic_id' => $datos['mechanic_id']
            ]);
            $order->subtotal = $detail->service_price;
            $order->tax = $order->subtotal * 0.13;
            $order->total = $order->subtotal + $order->tax;
            $order->save();
            $response->response_state = 'C';
        }
        $response->save();
        return redirect()->back();
    }
}
