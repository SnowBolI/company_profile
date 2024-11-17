@if ($articles->count() != 0)
  @foreach ($articles as $article)
      <div class="section-header mt-3">
        <div class="article-image mb-3">
          <a href="{{ route('blog_edukasi.show', $article->slug) }}" class="decoration-none">
            @if($article->gambar_utama)
              <img src="{{ asset('storage/' . $article->gambar_utama) }}" 
                   alt="{{ $article->judul }}" 
                   class="img-fluid rounded w-100" 
                   style="object-fit: cover; height: 300px;">
            @else
              <img src="{{ asset('user/images/logonew.png') }}" 
                   alt="Default Article Image" 
                   class="img-fluid rounded w-50" 
                   style="object-fit: cover; height: 300px;">
            @endif
          </a>
        </div>

        <div class="mb-3">
          <a href="{{ route('blog_edukasi.show', $article->slug) }}" class="decoration-none">
            <div class="text-primary link-hover text-center" style="font-size: 40px; letter-spacing: .5px; line-height: 1.3;">
              {{ $article->judul }}
            </div>
          </a>
          <div class="text-center mt-1">
            <small class="font-italic">Tanggal: {{ date('d M Y', strtotime($article->tanggal)) }}</small>
          </div>
        </div>

          @php
              // Menghapus tag <img> dan <p> dari konten
              $content = preg_replace('/<img .*. \/>|<p.*?.>|<\/p>/', '', $article->keterangan);
          @endphp
        <p> 
          &emsp;&emsp;&emsp; {!! Str::limit($content, 725, ' . . .') !!}
        </p>
          <a href="{{ route('blog_edukasi.show', $article->slug) }}" class="ml-3"> <span class="text-primary">Baca Selengkapnya <i class="fa fa-long-arrow-right"></i> </span></a>
        <hr class="mt-3">
      </div>
  @endforeach
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
