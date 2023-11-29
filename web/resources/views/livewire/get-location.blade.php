<div>
    <iframe class="mt-6 h-96 w-1/2" style="border:0" Loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/directions?origin={{ $geolocation }}&destination={{ $destination }}&key={{ ENV('GOOGLE_MAPS_KEY')}}"></iframe>
</div>
@push('scripts')
<script>
    let geolocation = "";

    function obtenerUbicacion() {
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;
                geolocation = latitud + "," + longitud;

                @this.dispatch('geolocationChanged', {
                    geolocation: geolocation,
                    latitude: latitud,
                    longitude: longitud
                });
            }, function(error) {
                // Manejar errores
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("El usuario denegó la solicitud de geolocalización.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("La información de ubicación no está disponible.");
                        break;
                    case error.TIMEOUT:
                        alert("La solicitud para obtener la ubicación del usuario ha caducado.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("Ocurrió un error desconocido al obtener la ubicación.");
                        break;
                }
            });
        } else {
            alert("La geolocalización no es compatible con este navegador.");
        }
    }

    document.addEventListener('livewire:initialized', () => {
        obtenerUbicacion();
        @this.on('request-geolocation', (event) => {
            obtenerUbicacion();
        });
    });
</script>
@endpush