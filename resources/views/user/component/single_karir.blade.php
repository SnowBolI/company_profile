@if ($article != null)
  <div class="section-header mt-3">
    <div class="mb-3">
      <div class="text-dark text-center" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
        {{ $article->judul }}
      </div>
      <div class="text-center mt-1">
        <small class="font-italic">Tanggal: {{ date('d M Y', strtotime($article->tanggal)) }}</small>
      </div>
    </div>

    @if ($article->gambar_1 || $article->gambar_2 || $article->gambar_3)
      <!-- Slider untuk gambar -->
      <div id="articleCarousel" class="carousel slide mb-3" data-bs-ride="carousel">
        <div class="carousel-inner">
          @if ($article->gambar_1)
            <div class="carousel-item active">
              <img src="{{ asset('storage/' . $article->gambar_1) }}" 
                   alt="Gambar 1" 
                   class="d-block w-100 rounded" 
                   style="object-fit: cover; height: 400px;">
            </div>
          @endif
          @if ($article->gambar_2)
            <div class="carousel-item">
              <img src="{{ asset('storage/' . $article->gambar_2) }}" 
                   alt="Gambar 2" 
                   class="d-block w-100 rounded" 
                   style="object-fit: cover; height: 400px;">
            </div>
          @endif
          @if ($article->gambar_3)
            <div class="carousel-item">
              <img src="{{ asset('storage/' . $article->gambar_3) }}" 
                   alt="Gambar 3" 
                   class="d-block w-100 rounded" 
                   style="object-fit: cover; height: 400px;">
            </div>
          @endif
        </div>
        <!-- Tombol navigasi slider -->
        <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    @else
      <!-- Gambar default jika semua gambar tidak ada -->
      <div class="article-image mb-3">
        <img src="{{ asset('user/images/default-image.png') }}" 
             alt="Default Image" 
             class="img-fluid rounded w-100" 
             style="object-fit: cover; height: 400px;">
      </div>
    @endif

    <p class="mb-3 article text-justify"> 
      {!! $article->keterangan !!}
    </p>
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
