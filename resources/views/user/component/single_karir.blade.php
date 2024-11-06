@if ($article != null)
  <div class="section-header mt-3">
    <div class="mb-3">
      <div class="text-dark" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
        {{ $article->judul }}
      </div>
      <div class="mt-1">
        <small class="font-italic">Tanggal: {{ date('d M Y', strtotime($article->tanggal)) }}</small>
      </div>
    </div>

    @if($article->gambar) <!-- Menampilkan gambar jika ada -->
      <div class="article-image mb-3">
        <img src="{{ asset('storage/' . $article->gambar) }}" 
             alt="{{ $article->judul }}" 
             class="img-fluid rounded w-100" 
             style="object-fit: cover; height: 400px;"> <!-- Gambar dengan ukuran yang proporsional -->
      </div>
    @else
      <div class="article-image mb-3">
        <img src="{{ asset('user/images/default-image.png') }}" 
             alt="Default Image" 
             class="img-fluid rounded w-100" 
             style="object-fit: cover; height: 400px;"> <!-- Gambar default jika tidak ada -->
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
