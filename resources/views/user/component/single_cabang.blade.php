@if ($kantorkas != null && $kantorkas->count() > 0)
<div class="container mt-4">
    <div class="row">
        @foreach ($kantorkas as $kas)
            @if($kas) <!-- Cek apakah $k adalah objek yang valid -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="section-header">
                    <div class="article-image mb-3">
                        @if($kas->gambar) <!-- Cek apakah gambar ada -->
                            <img src="{{ asset('storage/' . $kas->gambar) }}"
                                alt="{{ $kas->nama }}" 
                                class="img-fluid rounded"
                                style="object-fit: cover; width: 400px; height: 400px;">
                        @else
                            <img src="{{ asset('user/images/logonew.png') }}"
                                alt="Default cabang Image"
                                class="img-fluid rounded w-50"
                                style="object-fit: cover; height: 300px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <div class="text-dark text-center" style="font-size: 30px; letter-spacing: .5px; line-height: 1.3;">
                            {{ $kas->nama }}
                        </div>
                    </div>

                    <div class="cabang-info text-center" style="font-size: 16px;">
                        <a href="https://maps.google.com/?q={{ urlencode($kas->alamat) }}" target="_blank" class="text-decoration-none">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            {{ $kas->alamat }}
                        </a>
                        <a href="tel:{{ $kas->telepon }}" class="text-decoration-none d-block mt-2">
                            <i class="fas fa-phone me-2"></i>
                            {{ $kas->telepon }}
                        </a>
                    </div>

                    <hr class="mt-3">
                </div>
            </div>
            @endif
        @endforeach
    </div>
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
