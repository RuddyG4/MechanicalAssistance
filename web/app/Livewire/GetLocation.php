<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class GetLocation extends Component
{
    public $geolocation, $request_latitude, $request_longitude, $request_location = false, $destination;

    public function render()
    {
        return view('livewire.get-location');
    }

    #[On('geolocationChanged')] 
    public function updateGeolocation($geolocation, $latitude, $longitude)
    {
        $this->geolocation = $geolocation;
        $this->request_latitude = $latitude;
        $this->request_longitude = $longitude;
        $this->request_location = true;
    }
}
