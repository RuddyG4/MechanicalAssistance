<?php

namespace App\Livewire;

use App\Models\Request;
use App\Models\Response;
use Livewire\Component;

class WorkshopHome extends Component
{
    public $requests;
    public $showModal = false, $response_description, $aprox_solution_time, $aprox_arrival_time, $workshop_id, $request_id, $pre_quote_amount;

    public function render()
    {
        return view('livewire.workshop-home');
    }

    public function mount()
    {
        $this->getRequests();
    }

    public function getRequests()
    {
        $this->requests = Request::with('customer.user')->withExists(['responses' => function ($query) {
            $query->where('workshop_id', session('workshop_id'));
        }])->where('request_state', 'O')->get();
    }

    public function respondRequest($id)
    {
        $this->showModal = true;
        $this->request_id = $id;
        $this->workshop_id = session('workshop_id');
    }

    public function sendResponse()
    {
        $data = $this->validate([
            'response_description' => 'required|max:255',
            'aprox_solution_time' => 'required|integer',
            'aprox_arrival_time' => 'required|integer',
            'pre_quote_amount' => 'required',
        ]);

        $data['workshop_id'] = $this->workshop_id;
        $data['request_id'] = $this->request_id;
        Response::create($data);
        $this->reset(['showModal', 'response_description', 'aprox_solution_time', 'aprox_arrival_time', 'workshop_id', 'request_id', 'pre_quote_amount']);
        $this->getRequests();
    }
}
