@extends('layouts.user')

@section('header')
    <style>
        .full-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 180px;
        }
        .carousel-item img {
            max-height: 100%; /* Adjust this height as per your layout */
            width: 100%;       /* Ensure the image scales to the full width */
            object-fit: cover; /* Ensures the image covers the area without stretching */
        }

        #carouselExampleFade {
            max-height: 100%; /* Same as the image's max height */
            overflow: hidden;  /* Prevents content from spilling out */
            margin-bottom: 0px; /* Adds spacing between the carousel and the content below */
        }
        .image-center{
          display: block;
          margin-left: 6.5px;
          margin-right: 6.5px;
          width: 100%;
        }
        .box {
          cursor: pointer;
          transition: all 0.3s ease;
        }
        .box:hover {
          transform: translateY(-5px);
        }
        .modal-body {
          padding: 20px;
        }
        .form-group {
          margin-bottom: 20px;
        }
        .hasil-bunga, .hasil-total {
          font-size: 18px;
          font-weight: bold;
        }
    </style>    
@endsection

@section('hero')
<section id="hero">
  <div class="hero-container">
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($homeSliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($slider->gambar) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
  </div>
</section>
@endsection

{{-- @section('hero')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active ">
            <img src="{{ asset('user/images/fua.png') }}" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/images/hero-bg.jpg') }}" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('user/images/klein.png') }}" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection --}}

@section('content')

      <!--========================== About Us Section ============================-->
      <section id="about">
      <div class="section-header">
        <p>PRODUK UNGGULAN</p>
        <h2>Nikmati Produk & Layanan<br>Terbaik Kami</h2>
      </div>
  <div class="about-container">
    <div class="content-grid">
      
      
      <div class="product-item">
        <div class="product-icon">💰</div>
        <h3>Tabungan</h3>
        <p>Simpanan nasabah yang memiliki imbal hasil bunga kompetitif fleksibilitas produk dan manfaat yang tinggi</p>
        <a href="#">Selengkapnya →</a>
      </div>
      
      <div class="product-item">
        <div class="product-icon">💳</div>
        <h3>Deposito</h3>
        <p>Simpanan nasabah dengan imbal hasil bunga dan dapat dicairkan berdasarkan jangka waktu yang ditentukan</p>
        <a href="#">Selengkapnya →</a>
      </div>
      
      <div class="product-item">
        <div class="product-icon">📈</div>
        <h3>Kredit</h3>
        <p>Produk fasilitas pendanaan untuk modal kerja, investasi dengan tingkat suku bunga yang kompetitif</p>
        <a href="#">Selengkapnya →</a>
      </div>
      
      <div class="product-item">
        <div class="product-icon">📱</div>
        <h3>Mobile Banking</h3>
        <p>Layanan perbankan digital yang memudahkan transaksi Anda kapan saja dan dimana saja</p>
        <a href="#">Coming Soon →</a>
      </div>
    </div>
    
    <div class="featured-image">
      @if($homeThumbnails)
        <img src="{{ Storage::url($homeThumbnails->gambar) }}" alt="Bank Staff" />
      @else
        <img src="" alt="Bank Staff" />
      @endif
    </div>
  </div>
</section>

      <!-- Modal Simulasi Kredit -->
      <div class="modal fade" id="modal-kredit" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Form Simulasi Kredit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-simulasi-kredit">
                <div class="form-group">
                  <label>Jumlah Pinjaman</label>
                  <input type="number" class="form-control" name="jumlah_pinjaman" placeholder="ex: 50.000.000">
                  <small class="text-muted">Jumlah pinjaman minimal Rp 0</small>
                </div>
                <div class="form-group">
                  <label>Lama Pinjaman</label>
                  <input type="number" class="form-control" name="lama_pinjaman" placeholder="ex: 12">
                  <small class="text-muted">Maksimal lama pinjaman bulan</small>
                </div>
                <div class="form-group">
                  <label>Bunga Pinjaman</label>
                  <input type="number" class="form-control" name="bunga_pinjaman" placeholder="ex: 5" step="0.1">
                  <small class="text-muted">% per Tahun</small>
                </div>
                <div class="form-group">
                  <label>Mulai Meminjam</label>
                  <div class="row">
                    <div class="col-md-6">
                      <select class="form-control" name="bulan">
                        <option value="">- Bulan -</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <!-- [Add remaining months] -->
                      </select>
                    </div>
                    <div class="col-md-6">
                      <select class="form-control" name="tahun">
                        <option value="">- Tahun -</option>
                        <!-- [Add years dynamically with JavaScript] -->
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Perhitungan Bunga</label>
                  <select class="form-control" name="perhitungan_bunga">
                    <option value="tetap">Tetap</option>
                    <option value="anuitas">Anuitas</option>
                    <option value="menurun">Menurun</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success">Kalkulasi</button>
              </form>
              <div id="hasil-kredit" class="mt-4" style="display: none;"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Simulasi Deposito -->
      <div class="modal fade" id="modal-deposito" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Simulasi Deposito</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-simulasi-deposito">
                <div class="form-group">
                  <label>Deposito Berjangka 6 Bulan / 6 bulan</label>
                  <input type="number" class="form-control" name="jumlah_deposito" placeholder="10000">
                </div>
                <button type="submit" class="btn btn-success btn-block">Hitung</button>
                <div class="mt-4">
                  <p>Jumlah Bunga:<br>
                    <span class="hasil-bunga">Rp 0</span>
                  </p>
                  <p>Hasil:<br>
                    <span class="hasil-total">Rp 0</span>
                  </p>
                  <small class="text-muted">*Bunga yang ditampilkan dalam hitungan pertahun dan belum dikurangi Pajak</small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Simulasi Tabungan -->
      <div class="modal fade" id="modal-tabungan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Simulasi Tabungan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-simulasi-tabungan">
                <div class="form-group">
                  <label>Tabungan Sisa Belanja (TASIJA) / 12 bulan</label>
                  <input type="number" class="form-control" name="jumlah_tabungan" placeholder="1000000">
                </div>
                <button type="submit" class="btn btn-success btn-block">Hitung</button>
                <div class="mt-4">
                  <p>Jumlah Bunga:<br>
                    <span class="hasil-bunga">Rp 0</span>
                  </p>
                  <p>Hasil:<br>
                    <span class="hasil-total">Rp 0</span>
                  </p>
                  <small class="text-muted">*Bunga yang ditampilkan dalam hitungan pertahun dan belum dikurangi Pajak</small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  
  <section id="call-to-action">
  <div class="row mt-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
        <div class="simulation-card" data-toggle="modal" data-target="#modal-kredit">
          <div class="icon-circle">
            <i class="fa fa-money"></i>
          </div>
          <h4 class="simulation-title">SIMULASI KREDIT</h4>
          <p class="simulation-description">Hitung Rencana Kredit Anda</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
        <div class="simulation-card" data-toggle="modal" data-target="#modal-deposito">
          <div class="icon-circle">
            <i class="fa fa-thumbs-up"></i>
          </div>
          <h4 class="simulation-title">SIMULASI DEPOSITO</h4>
          <p class="simulation-description">Hitung Rencana Deposito Anda</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="simulation-card" data-toggle="modal" data-target="#modal-tabungan">
          <div class="icon-circle">
            <i class="fa fa-bank"></i>
          </div>
          <h4 class="simulation-title">SIMULASI TABUNGAN</h4>
          <p class="simulation-description">Hitung Rencana Tabungan Anda</p>
        </div>
      </div>
    </div>
    </div>
</section>
      
      <!--========================== YouTube Section ============================-->
    <section id="youtube">
      <div class="container wow fadeInUp">
        <div class="youtube-frame">
            @if($youtubeId)
            <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen></iframe>
            @else
                <p>Tidak ada video yang tersedia.</p>
            @endif
        </div>
        {{-- <div class="container wow fadeInUp">
          <div class="youtube-frame">
          <iframe src="https://www.youtube.com/embed/8SIFoy8dXgg"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen></iframe>
          </div>
      </div> --}}
    </div>
    </section>

      <!--========================== category Section ============================-->
      <section id="category">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Blog Kami</h3>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
          </div>
          <div class="row">
  
          <div class="row" id="category-wrapper">
            @foreach ($categories as $category)
                <div class="col-md-4 col-sm-12 category-item filter-app" >
                      <a href="blog">
                        <img src="{{asset('category_image/'.$category->image)}}" class="image-center">
                        <div class="details">
                          <h4>{{$category->name}}</h4>
                          <span>{{$category->description}}</span>
                        </div>
                      </a>
                </div>
            @endforeach  
          </div>
  
        </div>
      </section>
  
      <!--========================== Gallery Section ============================-->
      <section id="contact" style="padding-bottom:85px">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">Galeri</h3>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
          </div>
        </div>
  
        <div class="container wow fadeInUp">
          <div class="row justify-content-center">
  
            <div class="col-lg-12 col-md-4">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/prambanan.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata2.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata3.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata4.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata5.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata6.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata7.png')}})">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 full-img" style="background-image: url({{asset('user/images/gallery/wisata8.png')}})">
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
  // Populate years dropdown
  var currentYear = new Date().getFullYear();
  for(var i = currentYear; i <= currentYear + 10; i++) {
    $('#modal-kredit select[name="tahun"]').append(
      $('<option></option>').val(i).html(i)
    );
  }
  
  // Simulasi Kredit
  $('#form-simulasi-kredit').on('submit', function(e) {
    e.preventDefault();
    var jumlahPinjaman = parseFloat($('input[name="jumlah_pinjaman"]').val());
    var lamaPinjaman = parseInt($('input[name="lama_pinjaman"]').val());
    var bungaPinjaman = parseFloat($('input[name="bunga_pinjaman"]').val());
    var perhitunganBunga = $('select[name="perhitungan_bunga"]').val();
    
    var hasil = '';
    if (perhitunganBunga === 'tetap') {
      var bungaBulanan = (bungaPinjaman / 12) / 100;
      var angsuranPokok = jumlahPinjaman / lamaPinjaman;
      var angsuranBunga = jumlahPinjaman * bungaBulanan;
      var totalAngsuran = angsuranPokok + angsuranBunga;
      
      hasil = '<h4>Hasil Perhitungan:</h4>' +
              '<p>Angsuran Pokok: Rp ' + angsuranPokok.toFixed(2) + '</p>' +
              '<p>Angsuran Bunga: Rp ' + angsuranBunga.toFixed(2) + '</p>' +
              '<p>Total Angsuran per Bulan: Rp ' + totalAngsuran.toFixed(2) + '</p>';
    }
    // Add other calculation methods (anuitas, menurun) here
    
    $('#hasil-kredit').html(hasil).show();
  });

  var myCarousel = document.getElementById('carouselExampleFade');
    myCarousel.addEventListener('slid.bs.carousel', function (event) {
        if (event.to === 0 && event.from === (myCarousel.querySelectorAll('.carousel-item').length - 1)) {
            // Force a fade effect when wrapping from last slide to first
            myCarousel.classList.add('carousel-fade');
        } else {
            myCarousel.classList.remove('carousel-fade');
        }
    });

  // Simulasi Deposito
  $('#form-simulasi-deposito').on('submit', function(e) {
    e.preventDefault();
    var jumlah = parseFloat($('input[name="jumlah_deposito"]').val());
    var bungaDeposito = 0.05; // 5% per tahun
    var periode = 6; // 6 bulan
    
    var bungaPerBulan = bungaDeposito / 12;
    var hasilBunga = jumlah * bungaPerBulan * periode;
    var total = jumlah + hasilBunga;
    
    $(this).find('.hasil-bunga').text('Rp ' + hasilBunga.toFixed(2));
    $(this).find('.hasil-total').text('Rp ' + total.toFixed(2));
  });

  // Simulasi Tabungan
  $('#form-simulasi-tabungan').on('submit', function(e) {
    e.preventDefault();
    var jumlah = parseFloat($('input[name="jumlah_tabungan"]').val());
    var bungaTabungan = 0.02; // 2% per tahun
    var periode = 12; // 12 bulan
    
    var bungaPerBulan = bungaTabungan / 12;
    var hasilBunga = jumlah * bungaPerBulan * periode;
    var total = jumlah + hasilBunga;
    
    $(this).find('.hasil-bunga').text('Rp ' + hasilBunga.toFixed(2));
    $(this).find('.hasil-total').text('Rp ' + total.toFixed(2));
  });
});
</script>
@endsection