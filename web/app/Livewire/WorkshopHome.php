<?php

namespace App\Livewire;

use App\Models\Request;
use App\Models\Users\Mechanic;
use Livewire\Component;

class WorkshopHome extends Component
{
    public $requests, $mechanics;
    public $showModal = true;
    
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
        $this->requests = Request::with('customer.user')->where('request_state', 'O')->get();
    }

    public function respondRequest($id)
    {
        $this->showModal = true;
        // get the workshop id from the session
        $workshopId = session('workshop_id');
        $this->mechanics = Mechanic::where('disponibility', 1)->where('workshop_id', $workshopId)->with('user')->get();
    }
}
