@if ($cabangs->count() != 0)
    @foreach ($cabangs as $cabang)
        @if($loop->first)
        <div class="container">
            <div class="section-header mt-3">
                <div class="article-image mb-3">
                    @if($cabang->gambar)
                        <img src="{{ asset('storage/' . $cabang->gambar) }}"
                            alt="{{ $cabang->nama }}"
                            class="img-fluid rounded w-100"
                            style="object-fit: cover; height: 450px;">
                    @else
                        <img src="{{ asset('user/images/logonew.png') }}"
                            alt="Default cabang Image"
                            class="img-fluid rounded w-50"
                            style="object-fit: cover; height: 300px;">
                    @endif
                </div>

                <div class="mb-3">
                    <div class="text-dark text-center" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
                        {{ $cabang->nama }}
                    </div>
                </div>

                <div class="cabang-info text-center" style="font-size: 16px;">
                    <a href="https://maps.google.com/?q={{ urlencode($cabang->alamat) }}" target="_blank" class="text-decoration-none">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        {{ $cabang->alamat }}
                    </a>
                    <a href="tel:{{ $cabang->telepon }}" class="text-decoration-none d-block mt-2">
                        <i class="fas fa-phone me-2"></i>
                        {{ $cabang->telepon }}
                    </a>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('cabang.single', $cabang->id) }}" class="btn btn-primary">
                        Kantor Kas
                    </a>
                </div>
                <hr class="mt-3">
            </div>
        </div>
        @endif
    @endforeach

    {{-- Grid Layout for Remaining Items --}}
    <div class="container mt-4">
        <div class="row">
            @foreach ($cabangs as $cabang)
                @if(!$loop->first)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="section-header">
                        <div class="article-image mb-3">
                            @if($cabang->gambar)
                                <img src="{{ asset('storage/' . $cabang->gambar) }}"
                                    alt="{{ $cabang->nama }}" 
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
                                {{ $cabang->nama }}
                            </div>
                        </div>

                        <div class="cabang-info text-center" style="font-size: 16px;">
                            <a href="https://maps.google.com/?q={{ urlencode($cabang->alamat) }}" target="_blank" class="text-decoration-none">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                {{ $cabang->alamat }}
                            </a>
                            <a href="tel:{{ $cabang->telepon }}" class="text-decoration-none d-block mt-2">
                                <i class="fas fa-phone me-2"></i>
                                {{ $cabang->telepon }}
                            </a>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('cabang.single', $cabang->id) }}" class="btn btn-primary">
                                Kantor Kas
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