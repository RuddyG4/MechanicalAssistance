<?php

namespace App\Livewire\Requests;

use App\Models\Request;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRequest extends Component
{
    use WithFileUploads;
    
    public $request_title, $request_description, $request_location = false, $files = [], $vehicle_id, $file_descriptions = [];
    public $vehicles;
    
    public function render()
    {
        return view('livewire.requests.create-request');
    }

    public function mount()
    {
        $this->vehicles = Vehicle::where('owner_id', auth()->user()->id)->get();
    }

    public function store()
    {
        $data = $this->validate([
            'request_title' => 'required|max:50',
            'request_description' => 'required|max:255',
            'vehicle_id' => 'required|integer',
            'request_location' => 'required',
            'files.*' => 'image|max:1024'
        ]);
        $data['customer_id'] = auth()->user()->id;
        $request = Request::create($data);

        foreach ($this->files as $key => $file) {
            $request->multimedia()->create([
                'multimedia_path' => $file->store('public/requests'),
                'multimedia_description' => $this->file_descriptions[$key],
                'multimedia_type' => 'image',
                'multimedia_extension' => $file->getClientOriginalExtension(),
                'request_id' => $request->id
            ]);
        }

        $this->reset(['request_title', 'request_description', 'request_location', 'files']);
        // show alert message
        session()->flash('request created', 'Request created successfully!');
    }
}
