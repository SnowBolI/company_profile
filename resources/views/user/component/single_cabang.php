@extends('layouts.user')

@section('content')
<section class="container mt-5">
    <div class="row">
        <!-- Ngariboyo Branch -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ url('images/kantor/ngariboyo.jpg') }}" class="card-img-top" alt="Kantor Kas Ngariboyo">
                <div class="card-body">
                    <h5 class="card-title text-center">Kantor Kas Ngariboyo</h5>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Jl. Raya Ngariboyo-Parang Kec. Ngariboyo - Magetan
                    </p>
                    <p class="card-text">
                        <i class="fas fa-phone me-2"></i>
                        (0351) 894625
                    </p>
                </div>
            </div>
        </div>

        <!-- Panekan Branch -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ url('images/kantor/panekan.jpg') }}" class="card-img-top" alt="Kantor Kas Panekan">
                <div class="card-body">
                    <h5 class="card-title text-center">Kantor Kas Panekan</h5>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Jl. Raya Panekan, Kel. Panekan RT 05/01, Kec. Panekan - Magetan
                    </p>
                    <p class="card-text">
                        <i class="fas fa-phone me-2"></i>
                        (0351) 448455
                    </p>
                </div>
            </div>
        </div>

        <!-- Other branches following the same pattern -->
    </div>
</section>
@endsection