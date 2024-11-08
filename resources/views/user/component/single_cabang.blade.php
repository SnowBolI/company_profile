@if ($cabang != null)
    <div class="section-header mt-3">
        <div class="mb-3">
            <div class="text-dark text-center" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
                {{ $cabang->nama }}
            </div>
        </div>

        @if($cabang->gambar)
            <div class="article-image mb-3">
                <img src="{{ asset('storage/' . $cabang->gambar) }}" 
                     alt="{{ $cabang->nama }}" 
                     class="img-fluid rounded w-100" 
                     style="object-fit: cover; height: 400px;">
            </div>
        @else
            <div class="article-image mb-3">
                <img src="{{ asset('user/images/default-image.png') }}" 
                     alt="Default Image" 
                     class="img-fluid rounded w-100" 
                     style="object-fit: cover; height: 400px;">
            </div>
        @endif

        <div class="cabang-info text-center mb-4">
            <p>
                <i class="fas fa-map-marker-alt me-2"></i>
                {{ $cabang->alamat }}
            </p>
            <p>
                <i class="fas fa-phone me-2"></i>
                {{ $cabang->telepon }}
            </p>
        </div>

        <p class="mb-3 article text-justify"> 
            {!! $cabang->gmap !!}
        </p>

        <!-- Kantor Kas Section -->
        @if($cabang->kantor_kas && count($cabang->kantor_kas) > 0)
            <div class="mt-5">
                <h3 class="text-center mb-4">Kantor Kas</h3>
                @foreach($cabang->kantor_kas as $kas)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">{{ $kas->nama }}</h4>
                            <div class="cabang-info">
                                <p>
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $kas->alamat }}
                                </p>
                                <p>
                                    <i class="fas fa-phone me-2"></i>
                                    {{ $kas->telepon }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>    
@else
    <style>
        .page {
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
        }
    </style>
    <div class="full-height bg-white mt-5 d-flex align-items-center justify-content-center" style="height: 10vh;">
        <div class="code font-weight-bold text-center" style="border-right: 3px solid; font-size: 60px; padding: 0 15px 0 15px;">
            404
        </div>
        <div class="text-center" style="padding: 10px; font-size: 46px;">
            Not Found
        </div>
    </div>    
@endif