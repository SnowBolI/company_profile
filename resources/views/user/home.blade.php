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
    max-height: 100%;
    /* Adjust this height as per your layout */
    width: 100%;
    /* Ensure the image scales to the full width */
    object-fit: cover;
    /* Ensures the image covers the area without stretching */
  }

  #carouselExampleFade {
    max-height: 100%;
    /* Same as the image's max height */
    overflow: hidden;
    /* Prevents content from spilling out */
    margin-bottom: 0px;
    /* Adds spacing between the carousel and the content below */
  }

  .image-center {
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

  .hasil-bunga,
  .hasil-total {
    font-size: 18px;
    font-weight: bold;
  }

  /* body,
  #about,
  #youtube,
  #category {
    background:
      linear-gradient(to right,
        rgba(240, 240, 240, 0) 0%,
        rgba(240, 240, 240, 0.8) 25%,
        rgba(240, 240, 240, 0.8) 75%,
        rgba(240, 240, 240, 0) 100%),
      url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d3d3d3'%3E%3Cpath d='M30 30c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10-10-4.477-10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    background-attachment: fixed;
  } */

  #about {
    background-color: transparent;
  }

  #youtube {
    background-color: transparent;
  }

  #category {
    background-color: transparent;
  }
</style>
@endsection

<section id="hero">
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
</section>


{{-- @section('hero')
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
  <div class="about-header">
    <p>PRODUK UNGGULAN</p>
    <h2>Nikmati Produk & Layanan<br>Terbaik Kami</h2>
  </div>
  <div class="about-container">
    <div class="content-grid">
      <div class="product-item">
        <div class="product-icon">💳</div>
        <h3>Deposito</h3>
        <p>Simpanan nasabah dengan imbal hasil bunga dan dapat dicairkan berdasarkan jangka waktu yang ditentukan</p>
        <a href="#">Selengkapnya →</a>
      </div>

      <div class="product-item">
        <div class="product-icon">🤝🏻</div>
        <h3>Tabungan</h3>
        <p>Produk fasilitas pendanaan untuk modal kerja, investasi dengan tingkat suku bunga yang kompetitif</p>
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
        <div class="row">
          <form id="form-simulasi-kredit">
            <div class="form-group">
              <label>Jumlah Pinjaman</label>
              <input type="number" class="form-control border-0 bg-light px-4" name="pokok_pinjaman" id="pokok_pinjaman"
                placeholder="ex: 50.000.000">
              <small class="text-muted">Jumlah pinjaman minimal Rp 0</small>
            </div>
            <div class="form-group">
              <label>Lama Pinjaman</label>
              <input type="number" class="form-control border-0 bg-light px-4" name="jangka_waktu" id="jangka_waktu"
                placeholder="ex: 12">
              <small class="text-muted">Maksimal lama pinjaman bulan</small>
            </div>
            <div class="form-group">
              <label>Bunga Pinjaman</label>
              <input type="number" class="form-control border-0 bg-light px-4" name="suku_bunga" id="suku_bunga"
                placeholder="ex: 5" step="0.1">
              <small class="text-muted">% per Tahun</small>
            </div>
            <div class="form-group">
              <label>Mulai Meminjam</label>
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control form-select border-0 bg-light px-4" name="bulan_mulai" id="bulan_mulai">
                    <option value="">- Bulan -</option>
                    <option value="0">Januari</option>
                    <option value="1">Februari</option>
                    <option value="2">Maret</option>
                    <option value="3">April</option>
                    <option value="4">Mei</option>
                    <option value="5">Juni</option>
                    <option value="6">Juli</option>
                    <option value="7">Agustus</option>
                    <option value="8">September</option>
                    <option value="9">Oktober</option>
                    <option value="10">November</option>
                    <option value="11">Desember</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <select name="tahun_mulai" id="tahun_mulai" class="form-control form-select border-0 bg-light px-4">
                    <option value="">- Tahun -</option>
                    <!-- [Add years dynamically with JavaScript] -->
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Perhitungan Bunga</label>
              <select class="form-control form-select border-0 bg-light px-4" name="jenis_angsuran_in" id="jenis_angsuran_in" ">
                <option value="tetap">Tetap</option>
                <option value="efektif">Anuitas</option>
                <option value="menurun">Menurun</option>
              </select>
            </div>
            <button type="button" id="kalkulasi" value="Kalkulasi" class="btn btn-success py-3 hitung">Kalkulasi</button>
          </form>
        </div>
        <div class="col-md-12" id="hasil">
          <!-- Jadwal Angsuean -->
          <form action="#" class="bg-light bor-rad-10 p-4 contact-form">
            <h4 class="mb-4">Jadwal Angsuran</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Bunga Pinjaman Per Tahun</label>
                  <h5><span id="out-suku-bunga">0</span></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Jangka Waktu Pinjaman</label>
                  <h5><span id="out-jangka-waktu">0</span></h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Pokok Pinjaman</label>
                  <h5><span id="out-pokok-pinjaman">0</span></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Tanggal Pinjaman</label>
                  <h5><span id="out-tgl-mulai">0</span></h5>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Tenggang Waktu Pembayaran</label>
                  <h5>1 Bulan</h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Perhitungan Bunga</label>
                  <p>
                    <label class="radio-inline"><input id="jenis_angsuran_tetap" type="radio" name="jenis_angsuran"
                        value="tetap"><span class="ps-2">Tetap</span></label>
                    <label class="radio-inline ms-3"><input id="jenis_angsuran_efektif" type="radio"
                        name="jenis_angsuran" value="efektif"><span class="ps-2">Anuitas</span></label>
                    <label class="radio-inline ms-3"><input id="jenis_angsuran_menurun" type="radio"
                        name="jenis_angsuran" value="menurun"><span class="ps-2">Menurun</span></label>
                  </p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="mb-0" for="bungaPinjamanPerTahun">Angsuran per Bulan</label>
                  <h5><span id="out-cicilan-perbulan">0</span></h5>
                </div>
              </div>
            </div>
          </form>

          <!-- Tabel Angsuran -->
          <form action="#" class="bg-light bor-rad-10 mt-4 p-4 contact-form">
            <h4 class="mb-4">Tabel Angsuran</h4>
            <div class="table-responsive">
              <table class="table table-bordered" id="table-angsuran">
                <thead class="thead-dark">
                  <tr>
                    <th>Bulan Ke-</th>
                    <th>Bulan</th>
                    <th>Pokok Pinjaman</th>
                    <th>Cicilan Pokok Pinjaman</th>
                    <th>Bunga</th>
                    <th>Angsuran per Bulan</th>
                    <th id="saldo_pokok_pinjaman_id">Saldo Pokok Pinjaman</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
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
          <input type="hidden" name="jenis_simulasi" value="deposito" id="jenis_simulasi">
          <div class="form-group mb-3">
            <select id="jangka_waktu_deposito" name="jangka_waktu_deposito"
              class="form-control form-select border-0 bg-light px-4" style="height: 55px;">
              <option value="">- Pilih Deposito -</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <input id="jumlah_dana_deposito" type="number" class="form-control border-0 bg-light px-4"
              placeholder="Jumlah Dana" style="height: 55px;">
          </div>
          <div class="form-group mb-3">
            <button class="btn btn-success w-100 py-3" type="button" onclick="hitungSimulasiDeposito()">Hitung</button>
          </div>
          <div class="form-group mb-3" id="jumlahbunga_deposito">
            <label>Jumlah Bunga:</label>
            <input id="jumlah_bunga_deposito" name="jumlah_bunga_deposito" class="form-control border-0 bg-light px-4"
              placeholder="Jumlah Bunga" style="height: 55px;" readonly>
          </div>
          <div class="form-group mb-3" id="hasilsimulasi_deposito">
            <label>Hasil:</label>
            <input id="hasil_simulasi_deposito" name="hasil_simulasi_deposito"
              class="form-control border-0 bg-light px-4" placeholder="Hasil Simulasi" style="height: 55px;" readonly>
          </div>
          <small class="text-muted">*Bunga yang ditampilkan dalam hitungan pertahun dan belum dikurangi pajak.</small>
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
          <input type="hidden" name="jenis_simulasi" value="tabungan" id="jenis_simulasi">
          <div class="form-group mb-3">
            <select id="jangka_waktu_tabungan" name="jangka_waktu_tabungan"
              class="form-control form-select border-0 bg-light px-4" style="height: 55px;">
              <option value="">- Pilih Tabungan -</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <input id="jumlah_dana_tabungan" type="number" class="form-control border-0 bg-light px-4"
              placeholder="Jumlah Dana" style="height: 55px;">
          </div>
          <div class="form-group mb-3">
            <button class="btn btn-success w-100 py-3" type="button" onclick="hitungSimulasiTabungan()">Hitung</button>
          </div>
          <div class="form-group mb-3" id="jumlahbunga_tabungan">
            <label>Jumlah Bunga:</label>
            <input id="jumlah_bunga_tabungan" name="jumlah_bunga_tabungan" class="form-control border-0 bg-light px-4"
              placeholder="Jumlah Bunga" style="height: 55px;" readonly>
          </div>
          <div class="form-group mb-3" id="hasilsimulasi_tabungan">
            <label>Hasil:</label>
            <input id="hasil_simulasi_tabungan" name="hasil_simulasi_tabungan"
              class="form-control border-0 bg-light px-4" placeholder="Hasil Simulasi" style="height: 55px;" readonly>
          </div>
          <small class="text-muted">*Bunga yang ditampilkan dalam hitungan pertahun dan belum dikurangi pajak.</small>
        </form>
      </div>
    </div>
  </div>
</div>



<section id="call-to-action" @if($homeBackgrounds->isNotEmpty())
  @foreach($homeBackgrounds as $backgrounds)
  style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('storage/' .
  $backgrounds->gambar) }}');">
  @endforeach
  @endif
  >
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
      {{-- <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
        doloremque</p> --}}
    </div>
    <div class="row">

      <div class="row" id="category-wrapper">
        @if ($karirs && $karirs->count() > 0)
        @foreach ($karirs as $karir)
        <div class="col-md-4 col-sm-12 category-item">
          <a href="{{ route('blog_karir.show', $karir->slug) }}">
            <img src="{{ $karir->gambar_utama ? Storage::url($karir->gambar_utama) : asset('images/default.jpg') }}"
              class="image-center">
            <div class="details">
              <h4>{{ $karir->judul ?? 'Karir' }}</h4>
              <span>{!! $karir->keterangan ?? 'Tidak ada keterangan' !!}</span>
            </div>
          </a>
        </div>
        @endforeach
        @endif

        @if ($edukasis && $edukasis->count() > 0)
        @foreach ($edukasis as $edukasi)
        <div class="col-md-4 col-sm-12 category-item">
          <a href="{{ route('blog_edukasi.show', $edukasi->slug) }}">
            <img src="{{ $edukasi->gambar_utama ? Storage::url($edukasi->gambar_utama) : asset('images/default.jpg') }}"
              class="image-center">
            <div class="details">
              <h4>{{ $edukasi->judul ?? 'Edukasi' }}</h4>
              <span>{!! $edukasi->keterangan ?? 'Tidak ada keterangan' !!}</span>
            </div>
          </a>
        </div>
        @endforeach
        @endif

        @if ($beritas && $beritas->count() > 0)
        @foreach ($beritas as $berita)
        <div class="col-md-4 col-sm-12 category-item">
          <a href="{{ route('blog_berita.show', $berita->slug) }}">
            <img src="{{ $berita->gambar_utama ? Storage::url($berita->gambar_utama) : asset('images/default.jpg') }}"
              class="image-center">
            <div class="details">
              <h4>{{ $berita->judul ?? 'Berita' }}</h4>
              <span>{!! $berita->keterangan ?? 'Tidak ada keterangan' !!}</span>
            </div>
          </a>
        </div>
        @endforeach
        @endif
      </div>


    </div>
</section>

<!--========================== Gallery Section ============================-->
<section id="penghargaan"
  style="padding-bottom: 85px; padding-top: 85px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
  <div class="container wow fadeInUp">
    <div class="section-header">
      <h3 class="section-title">Penghargaan</h3>
      {{-- <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
        doloremque</p> --}}
    </div>
  </div>

  {{-- <div class="penghargaan-container wow fadeInUp">
    <div class="box box-1" style="background-image: url('{{ asset('user/images/bank1.jpeg') }}');">
    </div>
    <div class="box box-2" style="background-image: url('{{ asset('user/images/bank2.jpg') }}');">
    </div>
    <div class="box box-3" style="background-image: url('{{ asset('user/images/bank3.jpeg') }}');">
    </div>
    <div class="box box-4" style="background-image: url('{{ asset('user/images/fua.png') }}');">
    </div>
    <div class="box box-5" style="background-image: url('{{ asset('user/images/fua.png') }}');">
    </div>
  </div> --}}
  <div class="penghargaan-container wow fadeInUp">
    @if ($penghargaans && $penghargaans->count() > 0)
    @foreach ($penghargaans as $penghargaan)
    <div class="box box-{{ $loop->iteration }}"
      style="background-image: url('{{ $penghargaan->gambar ? Storage::url($penghargaan->gambar) : asset('user/images/default.png') }}');">
    </div>
    @endforeach
    @else
    <!-- Jika tidak ada data, tampilkan placeholder -->
    <p>Tidak ada penghargaan yang tersedia saat ini.</p>
    @endif
  </div>

  <script>
    // Ambil elemen select
    const tahunSelect = document.getElementById("tahun_mulai");
  
    // Ambil tahun saat ini
    const tahunSaatIni = new Date().getFullYear();
  
    // Tambahkan opsi untuk tahun saat ini
    const option = document.createElement("option");
    option.value = tahunSaatIni; // Set value option
    option.textContent = tahunSaatIni; // Set teks option
    tahunSelect.appendChild(option); // Tambahkan option ke select
  </script>

  <script>
    $(function () {
      $('div.block-21 > iframe').attr({ width: '100%', height: 'auto' });

      var suku_bunga,
        jangka_waktu,
        pokok_pinjaman,
        bunga_pinjaman,
        angsuran,
        bunga_bulanan,
        angsuran_perbulan,
        jenis_angsuran,
        cicilan_pokok,
        i,
        new_item,
        bunga_menurun,
        bulan_mulai,
        tahun_mulai,
        mulai_pinjam,
        bunga_pinjaman_temp,
        date_options;

      $('.hitung').click(function (event) {
        suku_bunga = $('#suku_bunga').val();
        $('#out-suku-bunga').html(suku_bunga + '%');
        jangka_waktu = $('#jangka_waktu').val();
        $('#out-jangka-waktu').html(jangka_waktu + ' Bulan');
        pokok_pinjaman = $('#pokok_pinjaman').val();
        $('#out-pokok-pinjaman').html(digit_grouping(Math.round(pokok_pinjaman)));
        jenis_angsuran = $('#jenis_angsuran_in').val();
        bulan_mulai = $('#bulan_mulai').val();
        tahun_mulai = $('#tahun_mulai').val();
        date_options2 = { year: 'numeric', month: 'long' };
        saldo_pokok_pinjaman = pokok_pinjaman;
        bunga_pinjaman = pokok_pinjaman * suku_bunga * jangka_waktu / 1200;
        bunga_pinjaman_temp = 0;
        mulai_pinjam = new Date(tahun_mulai, bulan_mulai);
        date_options = { year: 'numeric', month: 'long', };
        $('#out-tgl-mulai').html(mulai_pinjam.toLocaleDateString('id', date_options2));
        $('#table-angsuran tbody tr').remove();
        switch (jenis_angsuran) {
          case 'tetap':
            $("#saldo_pokok_pinjaman_id").show();
            var bunga_tetap = pokok_pinjaman * suku_bunga / 1200;
            cicilan_pokok = pokok_pinjaman / jangka_waktu;
            for (i = 1; i <= jangka_waktu; i++) {
              mulai_pinjam.setMonth(mulai_pinjam.getMonth() + 1);
              angsuran_perbulan = cicilan_pokok + bunga_tetap;
              saldo_pokok_pinjaman = pokok_pinjaman - cicilan_pokok;
              angsuran = '<tr class="isi">' +
                '<td>' + i + '</td>' +
                '<td>' + mulai_pinjam.toLocaleDateString('id', date_options) + '</td>' +
                '<td>' + digit_grouping(Math.round(pokok_pinjaman)) + '</td>' +
                '<td>' + digit_grouping(Math.round(cicilan_pokok)) + '</td>' +
                '<td>' + digit_grouping(Math.round(bunga_tetap)) + '</td>' +
                '<td>' + digit_grouping(Math.round(angsuran_perbulan)) + '</td>' +
                '<td>' + digit_grouping(Math.round(saldo_pokok_pinjaman)) + '</td>' +
                '</tr>';
              new_item = $(angsuran).hide();
              $('#table-angsuran tbody').append(new_item);
              new_item.show(50 * i);
              pokok_pinjaman = saldo_pokok_pinjaman;
            }
            bunga_pinjaman_temp = bunga_pinjaman;
            $("#jenis_angsuran_tetap").prop("checked", true);
            $('#out-cicilan-perbulan').html(digit_grouping(Math.round(angsuran_perbulan)));
            break;
          case 'menurun':
            $("#saldo_pokok_pinjaman_id").show();
            cicilan_pokok = pokok_pinjaman / jangka_waktu;
            for (i = 1; i <= jangka_waktu; i++) {
              mulai_pinjam.setMonth(mulai_pinjam.getMonth() + 1);
              bunga_menurun = saldo_pokok_pinjaman * suku_bunga / 1200;
              bunga_pinjaman_temp += bunga_menurun;
              angsuran_perbulan = cicilan_pokok + bunga_menurun;
              saldo_pokok_pinjaman = pokok_pinjaman - cicilan_pokok;
              angsuran = '<tr class="isi">' +
                '<td>' + i + '</td>' +
                '<td>' + mulai_pinjam.toLocaleDateString('id', date_options) + '</td>' +
                '<td>' + digit_grouping(Math.round(pokok_pinjaman)) + '</td>' +
                '<td>' + digit_grouping(Math.round(cicilan_pokok)) + '</td>' +
                '<td>' + digit_grouping(Math.round(bunga_menurun)) + '</td>' +
                '<td>' + digit_grouping(Math.round(angsuran_perbulan)) + '</td>' +
                '<td>' + digit_grouping(Math.round(saldo_pokok_pinjaman)) + '</td>' +
                '</tr>';
              new_item = $(angsuran).hide();
              $('#table-angsuran tbody').append(new_item);
              new_item.show(50 * i);
              pokok_pinjaman = saldo_pokok_pinjaman;
            }
            $("#jenis_angsuran_menurun").prop("checked", true);
            $('#out-cicilan-perbulan').html("Lihat Tabel");
            break;
          case 'efektif':
            cicilan_pokok = pokok_pinjaman / jangka_waktu;
            var x = Math.pow(1 + suku_bunga / 1200, jangka_waktu);
            var y = Math.pow(1 + suku_bunga / 1200, jangka_waktu) - 1;
            angsuran_perbulan = suku_bunga / 1200 * pokok_pinjaman * x / y;
            var bunga_efektif, cicilan_efektif;

            $("#saldo_pokok_pinjaman_id").hide();

            var sukubunga_int = suku_bunga / 100;

            const rupiah = (number) => {
              return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
              }).format(number);
            }

            // 

            var angsuran_bunga_pertama = pokok_pinjaman * sukubunga_int / 12;

            var total_angsuran_pertama = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_pertama = pokok_pinjaman - (total_angsuran_pertama - angsuran_bunga_pertama);

            angsuran_pertama =
              '<tr class="isi">' +
              '<td>' + 1 + '</td>' +
              '<td>' + 'Januari ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman - (total_angsuran_pertama - angsuran_bunga_pertama))) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_pertama - angsuran_bunga_pertama)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_pertama)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_pertama)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kedua = pokok_pinjaman_pertama * sukubunga_int / 12;

            var total_angsuran_kedua = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kedua = pokok_pinjaman_pertama - (total_angsuran_kedua - angsuran_bunga_kedua);

            angsuran_kedua =
              '<tr class="isi">' +
              '<td>' + 2 + '</td>' +
              '<td>' + 'Februari ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kedua)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedua - angsuran_bunga_kedua)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kedua)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedua)) + '</td>' +


              '</tr>';

            var angsuran_bunga_ketiga = pokok_pinjaman_kedua * sukubunga_int / 12;

            var total_angsuran_ketiga = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_ketiga = pokok_pinjaman_kedua - (total_angsuran_ketiga - angsuran_bunga_ketiga);

            angsuran_ketiga =
              '<tr class="isi">' +
              '<td>' + 3 + '</td>' +
              '<td>' + 'Maret ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_ketiga)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketiga - angsuran_bunga_ketiga)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_ketiga)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketiga)) + '</td>' +


              '</tr>';

            var angsuran_bunga_keempat = pokok_pinjaman_ketiga * sukubunga_int / 12;

            var total_angsuran_keempat = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_keempat = pokok_pinjaman_ketiga - (total_angsuran_keempat - angsuran_bunga_keempat);

            angsuran_keempat =
              '<tr class="isi">' +
              '<td>' + 4 + '</td>' +
              '<td>' + 'April ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_keempat)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keempat - angsuran_bunga_keempat)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_keempat)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keempat)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kelima = pokok_pinjaman_keempat * sukubunga_int / 12;

            var total_angsuran_kelima = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kelima = pokok_pinjaman_keempat - (total_angsuran_kelima - angsuran_bunga_kelima);

            angsuran_kelima =
              '<tr class="isi">' +
              '<td>' + 5 + '</td>' +
              '<td>' + 'Mei ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kelima)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kelima - angsuran_bunga_kelima)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kelima)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kelima)) + '</td>' +


              '</tr>';

            var angsuran_bunga_keenam = pokok_pinjaman_kelima * sukubunga_int / 12;

            var total_angsuran_keenam = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_keenam = pokok_pinjaman_kelima - (total_angsuran_keenam - angsuran_bunga_keenam);

            angsuran_keenam =
              '<tr class="isi">' +
              '<td>' + 6 + '</td>' +
              '<td>' + 'Juni ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_keenam)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keenam - angsuran_bunga_keenam)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_keenam)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keenam)) + '</td>' +


              '</tr>';

            var angsuran_bunga_ketuju = pokok_pinjaman_keenam * sukubunga_int / 12;

            var total_angsuran_ketuju = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_ketuju = pokok_pinjaman_keenam - (total_angsuran_ketuju - angsuran_bunga_ketuju);

            angsuran_ketuju =
              '<tr class="isi">' +
              '<td>' + 7 + '</td>' +
              '<td>' + 'Juli ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_ketuju)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketuju - angsuran_bunga_ketuju)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_ketuju)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketuju)) + '</td>' +


              '</tr>';


            var angsuran_bunga_kedelapan = pokok_pinjaman_ketuju * sukubunga_int / 12;

            var total_angsuran_kedelapan = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kedelapan = pokok_pinjaman_ketuju - (total_angsuran_kedelapan - angsuran_bunga_kedelapan);

            angsuran_kedelapan =
              '<tr class="isi">' +
              '<td>' + 8 + '</td>' +
              '<td>' + 'Agustus ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kedelapan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedelapan - angsuran_bunga_kedelapan)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kedelapan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedelapan)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kesembilan = pokok_pinjaman_kedelapan * sukubunga_int / 12;

            var total_angsuran_kesembilan = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kesembilan = pokok_pinjaman_kedelapan - (total_angsuran_kesembilan - angsuran_bunga_kesembilan);

            angsuran_kesembilan =
              '<tr class="isi">' +
              '<td>' + 9 + '</td>' +
              '<td>' + 'September ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kesembilan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesembilan - angsuran_bunga_kesembilan)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kesembilan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesembilan)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kesepuluh = pokok_pinjaman_kesembilan * sukubunga_int / 12;

            var total_angsuran_kesepuluh = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kesepuluh = pokok_pinjaman_kesembilan - (total_angsuran_kesepuluh - angsuran_bunga_kesepuluh);

            angsuran_kesepuluh =
              '<tr class="isi">' +
              '<td>' + 10 + '</td>' +
              '<td>' + 'Oktober ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kesepuluh)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesepuluh - angsuran_bunga_kesepuluh)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kesepuluh)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesepuluh)) + '</td>' +


              '</tr>';


            var angsuran_bunga_kesebelas = pokok_pinjaman_kesepuluh * sukubunga_int / 12;

            var total_angsuran_kesebelas = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kesebelas = pokok_pinjaman_kesepuluh - (total_angsuran_kesebelas - angsuran_bunga_kesebelas);

            angsuran_kesebelas =
              '<tr class="isi">' +
              '<td>' + 11 + '</td>' +
              '<td>' + 'November ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kesebelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesebelas - angsuran_bunga_kesebelas)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kesebelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesebelas)) + '</td>' +


              '</tr>';


            var angsuran_bunga_keduabelas = pokok_pinjaman_kesebelas * sukubunga_int / 12;

            var total_angsuran_keduabelas = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_keduabelas = pokok_pinjaman_kesebelas - (total_angsuran_keduabelas - angsuran_bunga_keduabelas);

            angsuran_keduabelas =
              '<tr class="isi">' +
              '<td>' + 12 + '</td>' +
              '<td>' + 'Desember ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_keduabelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keduabelas - angsuran_bunga_keduabelas)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_keduabelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keduabelas)) + '</td>' +


              '</tr>';


            $('#table-angsuran tbody').append(angsuran_pertama);
            $('#table-angsuran tbody').append(angsuran_kedua);
            $('#table-angsuran tbody').append(angsuran_ketiga);
            $('#table-angsuran tbody').append(angsuran_keempat);
            $('#table-angsuran tbody').append(angsuran_kelima);
            $('#table-angsuran tbody').append(angsuran_keenam);
            $('#table-angsuran tbody').append(angsuran_ketuju);
            $('#table-angsuran tbody').append(angsuran_kedelapan);
            $('#table-angsuran tbody').append(angsuran_kesembilan);
            $('#table-angsuran tbody').append(angsuran_kesepuluh);
            $('#table-angsuran tbody').append(angsuran_kesebelas);
            $('#table-angsuran tbody').append(angsuran_keduabelas);


            for (i = 1; i <= jangka_waktu; i++) {
              mulai_pinjam.setMonth(mulai_pinjam.getMonth() + 1);
              bunga_efektif = saldo_pokok_pinjaman * suku_bunga / 1200;
              bunga_pinjaman_temp += bunga_efektif;
              cicilan_efektif = angsuran_perbulan - bunga_efektif;
              saldo_pokok_pinjaman = pokok_pinjaman - cicilan_efektif;

              //new update
              data_pokok_pinjaman = $('#pokok_pinjaman').val();
              data_cicilan_efektif = 0;
              data_bunga_efektif = suku_bunga * data_pokok_pinjaman / 100;

            }
            $("#jenis_angsuran_efektif").prop("checked", true);
            $('#out-cicilan-perbulan').html(digit_grouping(Math.round(angsuran_perbulan)));
            break;
        }
        $('[name="bunga_pinjaman"]').val(Math.round(bunga_pinjaman_temp));
      });

      $('[name="jenis_angsuran"]').change(function (event) {
        suku_bunga = $('#suku_bunga').val();
        jangka_waktu = $('#jangka_waktu').val();
        pokok_pinjaman = $('#pokok_pinjaman').val();
        jenis_angsuran = $('[name="jenis_angsuran"]:checked').val();
        bulan_mulai = $('#bulan_mulai').val();
        tahun_mulai = $('#tahun_mulai').val();
        saldo_pokok_pinjaman = pokok_pinjaman;
        bunga_pinjaman = pokok_pinjaman * suku_bunga * jangka_waktu / 1200;
        bunga_pinjaman_temp = 0;
        mulai_pinjam = new Date(tahun_mulai, bulan_mulai);
        date_options = { year: 'numeric', month: 'long', };
        $('#table-angsuran tbody tr').remove();
        switch (jenis_angsuran) {
          case 'tetap':
            $("#saldo_pokok_pinjaman_id").show();
            var bunga_tetap = pokok_pinjaman * suku_bunga / 1200;
            cicilan_pokok = pokok_pinjaman / jangka_waktu;
            for (i = 1; i <= jangka_waktu; i++) {
              mulai_pinjam.setMonth(mulai_pinjam.getMonth() + 1);
              angsuran_perbulan = cicilan_pokok + bunga_tetap;
              saldo_pokok_pinjaman = pokok_pinjaman - cicilan_pokok;
              angsuran = '<tr class="isi">' +
                '<td>' + i + '</td>' +
                '<td>' + mulai_pinjam.toLocaleDateString('id', date_options) + '</td>' +
                '<td>' + digit_grouping(Math.round(pokok_pinjaman)) + '</td>' +
                '<td>' + digit_grouping(Math.round(cicilan_pokok)) + '</td>' +
                '<td>' + digit_grouping(Math.round(bunga_tetap)) + '</td>' +
                '<td>' + digit_grouping(Math.round(angsuran_perbulan)) + '</td>' +
                '<td>' + digit_grouping(Math.round(saldo_pokok_pinjaman)) + '</td>' +
                '</tr>';
              new_item = $(angsuran).hide();
              $('#table-angsuran tbody').append(new_item);
              new_item.show(50 * i);
              pokok_pinjaman = saldo_pokok_pinjaman;
            }
            bunga_pinjaman_temp = bunga_pinjaman;
            $('#out-cicilan-perbulan').html(digit_grouping(Math.round(angsuran_perbulan)));
            break;
          case 'menurun':
            $("#saldo_pokok_pinjaman_id").show();
            cicilan_pokok = pokok_pinjaman / jangka_waktu;
            for (i = 1; i <= jangka_waktu; i++) {
              mulai_pinjam.setMonth(mulai_pinjam.getMonth() + 1);
              bunga_menurun = saldo_pokok_pinjaman * suku_bunga / 1200;
              bunga_pinjaman_temp += bunga_menurun;
              angsuran_perbulan = cicilan_pokok + bunga_menurun;
              saldo_pokok_pinjaman = pokok_pinjaman - cicilan_pokok;
              angsuran = '<tr class="isi">' +
                '<td>' + i + '</td>' +
                '<td>' + mulai_pinjam.toLocaleDateString('id', date_options) + '</td>' +
                '<td>' + digit_grouping(Math.round(pokok_pinjaman)) + '</td>' +
                '<td>' + digit_grouping(Math.round(cicilan_pokok)) + '</td>' +
                '<td>' + digit_grouping(Math.round(bunga_menurun)) + '</td>' +
                '<td>' + digit_grouping(Math.round(angsuran_perbulan)) + '</td>' +
                '<td>' + digit_grouping(Math.round(saldo_pokok_pinjaman)) + '</td>' +
                '</tr>';
              new_item = $(angsuran).hide();
              $('#table-angsuran tbody').append(new_item);
              new_item.show(50 * i);
              pokok_pinjaman = saldo_pokok_pinjaman;
            }
            $('#out-cicilan-perbulan').html('Lihat Tabel');
            break;
          case 'efektif':
            cicilan_pokok = pokok_pinjaman / jangka_waktu;
            var x = Math.pow(1 + suku_bunga / 1200, jangka_waktu);
            var y = Math.pow(1 + suku_bunga / 1200, jangka_waktu) - 1;
            angsuran_perbulan = suku_bunga / 1200 * pokok_pinjaman * x / y;
            var bunga_efektif, cicilan_efektif;

            $("#saldo_pokok_pinjaman_id").hide();

            var sukubunga_int = suku_bunga / 100;

            const rupiah = (number) => {
              return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
              }).format(number);
            }

            // 

            var angsuran_bunga_pertama = pokok_pinjaman * sukubunga_int / 12;

            var total_angsuran_pertama = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_pertama = pokok_pinjaman - (total_angsuran_pertama - angsuran_bunga_pertama);

            angsuran_pertama =
              '<tr class="isi">' +
              '<td>' + 1 + '</td>' +
              '<td>' + 'Januari ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman - (total_angsuran_pertama - angsuran_bunga_pertama))) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_pertama - angsuran_bunga_pertama)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_pertama)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_pertama)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kedua = pokok_pinjaman_pertama * sukubunga_int / 12;

            var total_angsuran_kedua = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kedua = pokok_pinjaman_pertama - (total_angsuran_kedua - angsuran_bunga_kedua);

            angsuran_kedua =
              '<tr class="isi">' +
              '<td>' + 2 + '</td>' +
              '<td>' + 'Februari ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kedua)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedua - angsuran_bunga_kedua)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kedua)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedua)) + '</td>' +


              '</tr>';

            var angsuran_bunga_ketiga = pokok_pinjaman_kedua * sukubunga_int / 12;

            var total_angsuran_ketiga = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_ketiga = pokok_pinjaman_kedua - (total_angsuran_ketiga - angsuran_bunga_ketiga);

            angsuran_ketiga =
              '<tr class="isi">' +
              '<td>' + 3 + '</td>' +
              '<td>' + 'Maret ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_ketiga)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketiga - angsuran_bunga_ketiga)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_ketiga)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketiga)) + '</td>' +


              '</tr>';

            var angsuran_bunga_keempat = pokok_pinjaman_ketiga * sukubunga_int / 12;

            var total_angsuran_keempat = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_keempat = pokok_pinjaman_ketiga - (total_angsuran_keempat - angsuran_bunga_keempat);

            angsuran_keempat =
              '<tr class="isi">' +
              '<td>' + 4 + '</td>' +
              '<td>' + 'April ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_keempat)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keempat - angsuran_bunga_keempat)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_keempat)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keempat)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kelima = pokok_pinjaman_keempat * sukubunga_int / 12;

            var total_angsuran_kelima = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kelima = pokok_pinjaman_keempat - (total_angsuran_kelima - angsuran_bunga_kelima);

            angsuran_kelima =
              '<tr class="isi">' +
              '<td>' + 5 + '</td>' +
              '<td>' + 'Mei ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kelima)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kelima - angsuran_bunga_kelima)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kelima)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kelima)) + '</td>' +


              '</tr>';

            var angsuran_bunga_keenam = pokok_pinjaman_kelima * sukubunga_int / 12;

            var total_angsuran_keenam = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_keenam = pokok_pinjaman_kelima - (total_angsuran_keenam - angsuran_bunga_keenam);

            angsuran_keenam =
              '<tr class="isi">' +
              '<td>' + 6 + '</td>' +
              '<td>' + 'Juni ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_keenam)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keenam - angsuran_bunga_keenam)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_keenam)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keenam)) + '</td>' +


              '</tr>';

            var angsuran_bunga_ketuju = pokok_pinjaman_keenam * sukubunga_int / 12;

            var total_angsuran_ketuju = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_ketuju = pokok_pinjaman_keenam - (total_angsuran_ketuju - angsuran_bunga_ketuju);

            angsuran_ketuju =
              '<tr class="isi">' +
              '<td>' + 7 + '</td>' +
              '<td>' + 'Juli ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_ketuju)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketuju - angsuran_bunga_ketuju)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_ketuju)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_ketuju)) + '</td>' +


              '</tr>';


            var angsuran_bunga_kedelapan = pokok_pinjaman_ketuju * sukubunga_int / 12;

            var total_angsuran_kedelapan = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kedelapan = pokok_pinjaman_ketuju - (total_angsuran_kedelapan - angsuran_bunga_kedelapan);

            angsuran_kedelapan =
              '<tr class="isi">' +
              '<td>' + 8 + '</td>' +
              '<td>' + 'Agustus ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kedelapan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedelapan - angsuran_bunga_kedelapan)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kedelapan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kedelapan)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kesembilan = pokok_pinjaman_kedelapan * sukubunga_int / 12;

            var total_angsuran_kesembilan = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kesembilan = pokok_pinjaman_kedelapan - (total_angsuran_kesembilan - angsuran_bunga_kesembilan);

            angsuran_kesembilan =
              '<tr class="isi">' +
              '<td>' + 9 + '</td>' +
              '<td>' + 'September ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kesembilan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesembilan - angsuran_bunga_kesembilan)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kesembilan)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesembilan)) + '</td>' +


              '</tr>';

            var angsuran_bunga_kesepuluh = pokok_pinjaman_kesembilan * sukubunga_int / 12;

            var total_angsuran_kesepuluh = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kesepuluh = pokok_pinjaman_kesembilan - (total_angsuran_kesepuluh - angsuran_bunga_kesepuluh);

            angsuran_kesepuluh =
              '<tr class="isi">' +
              '<td>' + 10 + '</td>' +
              '<td>' + 'Oktober ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kesepuluh)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesepuluh - angsuran_bunga_kesepuluh)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kesepuluh)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesepuluh)) + '</td>' +


              '</tr>';


            var angsuran_bunga_kesebelas = pokok_pinjaman_kesepuluh * sukubunga_int / 12;

            var total_angsuran_kesebelas = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_kesebelas = pokok_pinjaman_kesepuluh - (total_angsuran_kesebelas - angsuran_bunga_kesebelas);

            angsuran_kesebelas =
              '<tr class="isi">' +
              '<td>' + 11 + '</td>' +
              '<td>' + 'November ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_kesebelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesebelas - angsuran_bunga_kesebelas)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_kesebelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_kesebelas)) + '</td>' +


              '</tr>';


            var angsuran_bunga_keduabelas = pokok_pinjaman_kesebelas * sukubunga_int / 12;

            var total_angsuran_keduabelas = (pokok_pinjaman * (sukubunga_int / 12)) / (1 - 1 / (1 + sukubunga_int / 12) ** jangka_waktu);

            var pokok_pinjaman_keduabelas = pokok_pinjaman_kesebelas - (total_angsuran_keduabelas - angsuran_bunga_keduabelas);

            angsuran_keduabelas =
              '<tr class="isi">' +
              '<td>' + 12 + '</td>' +
              '<td>' + 'Desember ' + tahun_mulai + '</td>' +

              '<td>' + rupiah(Math.round(pokok_pinjaman_keduabelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keduabelas - angsuran_bunga_keduabelas)) + '</td>' +
              '<td>' + rupiah(Math.round(angsuran_bunga_keduabelas)) + '</td>' +
              '<td>' + rupiah(Math.round(total_angsuran_keduabelas)) + '</td>' +


              '</tr>';


            $('#table-angsuran tbody').append(angsuran_pertama);
            $('#table-angsuran tbody').append(angsuran_kedua);
            $('#table-angsuran tbody').append(angsuran_ketiga);
            $('#table-angsuran tbody').append(angsuran_keempat);
            $('#table-angsuran tbody').append(angsuran_kelima);
            $('#table-angsuran tbody').append(angsuran_keenam);
            $('#table-angsuran tbody').append(angsuran_ketuju);
            $('#table-angsuran tbody').append(angsuran_kedelapan);
            $('#table-angsuran tbody').append(angsuran_kesembilan);
            $('#table-angsuran tbody').append(angsuran_kesepuluh);
            $('#table-angsuran tbody').append(angsuran_kesebelas);
            $('#table-angsuran tbody').append(angsuran_keduabelas);


            for (i = 1; i <= jangka_waktu; i++) {
              mulai_pinjam.setMonth(mulai_pinjam.getMonth() + 1);
              bunga_efektif = saldo_pokok_pinjaman * suku_bunga / 1200;
              bunga_pinjaman_temp += bunga_efektif;
              cicilan_efektif = angsuran_perbulan - bunga_efektif;
              saldo_pokok_pinjaman = pokok_pinjaman - cicilan_efektif;

              //new update
              data_pokok_pinjaman = $('#pokok_pinjaman').val();
              data_cicilan_efektif = 0;
              data_bunga_efektif = suku_bunga * data_pokok_pinjaman / 100;

            }
            $('#out-cicilan-perbulan').html(digit_grouping(Math.round(angsuran_perbulan)));
            break;
        }
        $('#output [name="bunga_pinjaman"]').val(Math.round(bunga_pinjaman_temp));
      });
    });

    function digit_grouping(in_number, digit, delimiter) {
      digit = typeof digit !== 'undefined' ? digit : 3;
      delimiter = typeof delimiter !== 'undefined' ? delimiter : '.';
      in_number = in_number.toString();
      var x = in_number.length;
      if (x < 4) {
        return in_number;
      } else {
        var y = Math.floor(x / digit);
        var z = x % digit;
        var new_number = '', awal, akhir;
        if (z !== 0) {
          new_number = in_number.substring(0, z) + '.';
        }
        for (var i = 0; i < (y - 1); i++) {
          awal = (i * digit) + z;
          akhir = awal + digit;
          new_number = new_number + in_number.substring(awal, akhir) + '.';
        }
        awal = ((y - 1) * digit) + z;
        akhir = awal + digit;
        new_number = new_number + in_number.substring(awal, akhir);
        return new_number;
      }
    }

  </script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Sembunyikan hasil di awal
      document.getElementById('jumlahbunga_tabungan').style.display = 'none';
      document.getElementById('hasilsimulasi_tabungan').style.display = 'none';
    });

    fetch('/api/tabungan-types')
      .then(response => response.json())
      .then(data => {
        const select = document.getElementById('jangka_waktu_tabungan');
        data.forEach(tabungan => {
          const option = document.createElement('option');
          option.value = tabungan.jangka;  // Atau bisa berdasarkan jangka waktu, misalnya '12'
          option.textContent = `${tabungan.judul}`;
          option.setAttribute('data-bunga', tabungan.nilai_persentase * 100);
          select.appendChild(option);
        });
      });

    // Fungsi untuk menghitung simulasi tabungan
    function hitungSimulasiTabungan() {
      var jumlahDana = parseFloat(document.getElementById('jumlah_dana_tabungan').value);
      var selectElement = document.getElementById('jangka_waktu_tabungan');
      var bungaTabungan = parseFloat(selectElement.options[selectElement.selectedIndex].getAttribute('data-bunga'));

      if (isNaN(jumlahDana) || jumlahDana <= 0) {
        alert("Masukkan jumlah dana yang valid.");
        return;
      }

      if (isNaN(bungaTabungan) || bungaTabungan <= 0) {
        alert("Pilih jenis tabungan terlebih dahulu.");
        return;
      }

      // Hitung bunga dan total tabungan
      var jumlahBunga = (bungaTabungan / 100) * jumlahDana;
      var totalTabungan = jumlahBunga + jumlahDana;

      document.getElementById('jumlah_bunga_tabungan').value = formatRupiah(jumlahBunga);
      document.getElementById('hasil_simulasi_tabungan').value = formatRupiah(totalTabungan);

      // Tampilkan elemen hasil perhitungan
      document.getElementById('jumlahbunga_tabungan').style.display = 'block';
      document.getElementById('hasilsimulasi_tabungan').style.display = 'block';
    }

    // Fungsi untuk format angka ke Rupiah
    function formatRupiah(number) {
      return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
      }).format(number);
    }
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Sembunyikan hasil di awal
      document.getElementById('jumlahbunga_deposito').style.display = 'none';
      document.getElementById('hasilsimulasi_deposito').style.display = 'none';
    });

    fetch('/api/deposito-types')
      .then(response => response.json())
      .then(data => {
        const select = document.getElementById('jangka_waktu_deposito');
        data.forEach(deposito => {
          const option = document.createElement('option');
          option.value = deposito.jangka;  // Atau bisa berdasarkan jangka waktu, misalnya '12'
          option.textContent = `${deposito.judul}`;
          option.setAttribute('data-bunga', deposito.nilai_persentase * 100);
          select.appendChild(option);
        });
      });

    // Fungsi untuk menghitung simulasi deposito
    function hitungSimulasiDeposito() {
      var jumlahDana = parseFloat(document.getElementById('jumlah_dana_deposito').value);
      var selectElement = document.getElementById('jangka_waktu_deposito');
      var bungaDeposito = parseFloat(selectElement.options[selectElement.selectedIndex].getAttribute('data-bunga'));

      if (isNaN(jumlahDana) || jumlahDana <= 0) {
        alert("Masukkan jumlah dana yang valid.");
        return;
      }

      if (isNaN(bungaDeposito) || bungaDeposito <= 0) {
        alert("Pilih jenis deposito terlebih dahulu.");
        return;
      }

      // Hitung bunga dan total deposito
      var jumlahBunga = (bungaDeposito / 100) * jumlahDana;
      var totalDeposito = jumlahBunga + jumlahDana;

      document.getElementById('jumlah_bunga_deposito').value = formatRupiah(jumlahBunga);
      document.getElementById('hasil_simulasi_deposito').value = formatRupiah(totalDeposito);

      // Tampilkan elemen hasil perhitungan
      document.getElementById('jumlahbunga_deposito').style.display = 'block';
      document.getElementById('hasilsimulasi_deposito').style.display = 'block';
    }

    // Fungsi untuk format angka ke Rupiah
    function formatRupiah(number) {
      return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
      }).format(number);
    }
  </script>


</section>
@endsection

@section('scripts')
<script>
  $(document).ready(function () {

    // Populate years dropdown
    var currentYear = new Date().getFullYear();
    for (var i = currentYear; i <= currentYear + 10; i++) {
      $('#modal-kredit select[name="tahun"]').append(
        $('<option></option>').val(i).html(i)
      );
    }

    // Simulasi Kredit
    $('#form-simulasi-kredit').on('submit', function (e) {
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
    // $('#form-simulasi-deposito').on('submit', function(e) {
    //   e.preventDefault();
    //   var jumlah = parseFloat($('input[name="jumlah_deposito"]').val());
    //   var bungaDeposito = 0.05; // 5% per tahun
    //   var periode = 6; // 6 bulan

    //   var bungaPerBulan = bungaDeposito / 12;
    //   var hasilBunga = jumlah * bungaPerBulan * periode;
    //   var total = jumlah + hasilBunga;

    //   $(this).find('.hasil-bunga').text('Rp ' + hasilBunga.toFixed(2));
    //   $(this).find('.hasil-total').text('Rp ' + total.toFixed(2));
    // });

    // Simulasi Tabungan
    // $('#form-simulasi-tabungan').on('submit', function(e) {
    //   e.preventDefault();
    //   var jumlah = parseFloat($('input[name="jumlah_tabungan"]').val());
    //   var bungaTabungan = 0.02; // 2% per tahun
    //   var periode = 12; // 12 bulan

    //   var bungaPerBulan = bungaTabungan / 12;
    //   var hasilBunga = jumlah * bungaPerBulan * periode;
    //   var total = jumlah + hasilBunga;

    //   $(this).find('.hasil-bunga').text('Rp ' + hasilBunga.toFixed(2));
    //   $(this).find('.hasil-total').text('Rp ' + total.toFixed(2));
    // });
  });
</script>


@endsection