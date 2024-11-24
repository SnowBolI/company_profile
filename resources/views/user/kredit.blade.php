@extends('layouts.user')

@section('header')
<style>
  /* Menu Container Styling */
  /* Menu Container Styling */
  .nav-wrapper {
    background-color: #4CAF50;
    padding: 30px 0;
    width: 100%;
    margin-top: 0;
    margin-bottom: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .nav-wrapper .container {
    max-width: 1200px;
    padding: 0 15px;
    margin: 0 auto;
  }

  /* Reset default nav styles */
  .nav-pills {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
    padding: 0;
    /* Remove default padding */
    justify-content: center;
  }

  /* Reset nav item styles */
  .nav-item {
    width: 100%;
    margin: 0;
    /* Remove default margins */
    padding: 0;
    /* Remove default padding */
    list-style: none;
    /* Remove list styling */
  }

  /* Button Reset and Styling */
  .nav-pills .nav-link {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #1976D2;
    background-color: #ffffff;
    padding: 15px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 500;
    font-size: 14px;
    border: none;
    /* Remove border */
    outline: none;
    /* Remove outline */
    margin: 0;
    /* Remove margins */
    text-decoration: none;
    /* Remove text decoration */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    /* For hover effect */
    overflow: hidden;
    /* Ensure no content spills out */
  }

  /* Icon styling */
  .nav-pills .nav-link i {
    margin-right: 8px;
    font-size: 16px;
  }

  /* Active state */
  .nav-pills .nav-link.active {
    background-color: #FFC107;
    color: #ffffff;
    transform: translateY(-3px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  /* Hover state */
  .nav-pills .nav-link:hover {
    transform: translateY(-3px);
    background-color: #FFC107;
    color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
  }

  /* Remove focus outline */
  .nav-pills .nav-link:focus {
    outline: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
  }

  /* Remove any Bootstrap default styles that might interfere */
  .nav-pills .nav-link::before,
  .nav-pills .nav-link::after {
    display: none;
  }

  /* Responsive Design */
  @media (max-width: 1200px) {
    .nav-pills {
      grid-template-columns: repeat(2, 1fr);
      max-width: 800px;
    }
  }

  @media (max-width: 768px) {
    .nav-wrapper {
      padding: 20px 0;
    }

    .nav-pills {
      grid-template-columns: 1fr;
      gap: 10px;
    }

    .nav-pills .nav-link {
      padding: 12px 15px;
      font-size: 14px;
    }
  }

  /* Optional: Smooth transition for color changes */
  .nav-pills .nav-link {
    transition: all 0.3s ease-in-out;
  }

  /* Fix for any potential Bootstrap conflicts */
  .nav-pills .nav-item .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #FFC107;
    color: #ffffff;
  }

  /* Ensure content is centered */
  .nav-pills .nav-link span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  /* Optional: Add active indication with bottom border */
  .nav-pills .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: rgba(255, 255, 255, 0.3);
  }

  /* Tab Content Styling */
  .tab-content {
    padding: 20px;
    background-color: #f8f9fa;
  }

  .kredit-content {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  /* Info Box Styling */
  .kredit-info-box {
    background-color: #E3F2FD;
    padding: 20px;
    border-radius: 8px;
    margin: 15px 0;
  }

  .kredit-info-box ul {
    list-style-type: none;
    padding-left: 0;
  }

  .kredit-info-box ul li {
    margin-bottom: 10px;
    padding-left: 25px;
    position: relative;
  }

  .kredit-info-box ul li:before {
    content: '✓';
    color: #1976D2;
    position: absolute;
    left: 0;
  }

  /* Step Cards Styling */
  .step-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

  .step-card {
    background-color: #ffffff;
    border: 1px solid #E3F2FD;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    position: relative;
    transition: all 0.3s ease;
  }

  .step-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .step-number {
    width: 30px;
    height: 30px;
    background-color: #1976D2;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
  }

  /* Interest Rate Styling */
  .interest-rate {
    font-size: 36px;
    color: #1976D2;
    font-weight: bold;
    text-align: center;
    margin: 20px 0;
  }

  /* Simulation Calculator Styling */
  .simulation-calculator {
    max-width: 600px;
    margin: 0 auto;
  }

  .form-control {
    border: 1px solid #E3F2FD;
    padding: 5px;
    border-radius: 6px;
    margin-bottom: 15px;
  }

  .result-box {
    background-color: #E3F2FD;
    padding: 20px;
    border-radius: 8px;
    margin-top: 20px;
  }

  .result-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    padding: 10px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }

  .result-item:last-child {
    border-bottom: none;
  }

  /* Button Styling */
  .kredit-cta-button {
    background-color: #1976D2;
    color: white;
    padding: 12px 25px;
    border-radius: 5px;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .kredit-cta-button:hover {
    background-color: #1565C0;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .kredit-content {
      padding: 20px;
    }

    .step-cards {
      grid-template-columns: 1fr;
    }

    .interest-rate {
      font-size: 28px;
    }

    .angsuran-container {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
    }

    .jadwal-angsuran,
    .tabel-angsuran {
      background-color: #ffffff;
      border-radius: 8px;
      border: 1px solid #e2e2e2;
    }

    .jadwal-angsuran h4,
    .tabel-angsuran h4 {
      font-weight: bold;
      color: #333;
    }

    .jadwal-angsuran p,
    .tabel-angsuran th,
    .tabel-angsuran td {
      color: #666;
    }

    .table th,
    .table td {
      vertical-align: middle;
      text-align: center;
    }

  }
</style>
@endsection


@section('hero')
@if($produkSliders->isNotEmpty())
@foreach($produkSliders as $slider)
<section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
  <div class="hero-container">
    <h1>Kredit</h1>
    <h2></h2>
  </div>
</section>
@endforeach
@else
<section id="hero">
  <div class="hero-container">
    <h1>Kredit</h1>
    <h2></h2>
  </div>
</section>
@endif
@endsection

@section('content')
<section id="kredit">
  <div class="nav-wrapper">
    <div class="container">
      <ul class="nav nav-pills mb-0 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-pengajuan-kredit-tab" data-bs-toggle="pill"
            data-bs-target="#pills-pengajuan-kredit" type="button" role="tab" aria-controls="pills-pengajuan-kredit"
            aria-selected="true">
            <i class="fas fa-file-signature"></i> Pengajuan Kredit <!-- Icon for loan application -->
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-simulasi-kredit-tab" data-bs-toggle="pill"
            data-bs-target="#pills-simulasi-kredit" type="button" role="tab" aria-controls="pills-simulasi-kredit"
            aria-selected="false">
            <i class="fas fa-calculator"></i> Simulasi Kredit <!-- Icon for credit simulation -->
          </button>
        </li>
        @foreach($kreditData as $index => $kredit)
        @if(strtolower($kredit->judul) === 'modal usaha')
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
            data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
            aria-controls="pills-{{ Str::slug($kredit->judul) }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
            <i class="fas fa-briefcase"></i> {{ $kredit->judul }}
          </button>
        </li>
        @endif

        @if(strtolower($kredit->judul) === 'kredit komsumtif')
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
            data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
            aria-controls="pills-{{ Str::slug($kredit->judul) }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
            <i class="fas fa-shopping-cart"></i> {{ $kredit->judul }}
          </button>
        </li>
        @endif

        @if(strtolower($kredit->judul) === 'kredit sepeda motor')
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
            data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
            aria-controls="pills-{{ Str::slug($kredit->judul) }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
            <i class="fas fa-motorcycle"></i> {{ $kredit->judul }}
          </button>
        </li>
        @endif
        @if(strtolower($kredit->judul) === 'sertifikasi guru')
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
            data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
            aria-controls="pills-{{ Str::slug($kredit->judul) }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
            <i class="fas fa-chalkboard-teacher"></i> {{ $kredit->judul }}
          </button>
        </li>
        @endif
        @if(strtolower($kredit->judul) === 'multiguna')
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
            data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
            aria-controls="pills-{{ Str::slug($kredit->judul) }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
            <i class="fas fa-people-carry"></i> {{ $kredit->judul }}
          </button>
        </li>
        @endif
        @endforeach

      </ul>
    </div>
  </div>

  <div class="tab-content" id="pills-tabContent">
    <!-- Pengajuan Kredit Content -->
    <div class="tab-pane fade show active" id="pills-pengajuan-kredit" role="tabpanel"
      aria-labelledby="pills-pengajuan-kredit-tab">
      <div class="kredit-content">
        <h3>Pengajuan Kredit</h3>
        @if (($message = Session::get('message')))
        <div class="alert alert-success alert-dismissible fade show">
          <strong>Berhasil!</strong>
          <p>{{ $message }}</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <form action="{{ route('kredit.store') }}" method="post" class="kredit-form mt-4">
          @csrf
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap">
          </div>
          <div class="form-group mt-3">
            <label for="ktp">No. KTP</label>
            <input type="text" class="form-control" name="ktp" id="ktp" placeholder="Masukkan nomor KTP">
          </div>
          <div class="form-group mt-3">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat"></textarea>
          </div>
          <div class="form-group mt-3">
            <label for="hp">No. HP</label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Masukkan nomor HP">
          </div>
          <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email">
          </div>
          <!-- Additional Loan Fields -->
          <div class="form-group mt-3">
            <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
            <input type="number" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman"
              placeholder="Masukkan jumlah pinjaman">
          </div>
          <div class="form-group mt-3">
            <label for="waktu_pinjaman">Jangka Waktu Pinjaman (Bulan)</label>
            <input type="number" class="form-control" id="waktu_pinjaman" name="waktu_pinjaman"
              placeholder="Masukkan jangka waktu pinjaman dalam bulan">
          </div>
          <div class="form-group mt-3">
            <label for="tujuan_pinjaman">Tujuan Pinjaman</label>
            <textarea class="form-control" id="tujuan_pinjaman" name="tujuan_pinjaman" rows="2"
              placeholder="Masukkan tujuan pinjaman"></textarea>
          </div>
          <div class="form-group mt-3">
            <label for="jaminan">Jaminan</label>
            <textarea class="form-control" id="jaminan" name="jaminan" rows="2"
              placeholder="Masukkan jaminan"></textarea>
          </div>
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary mt-4 w-100">Kirim</button>
        </form>
      </div>
    </div>


    <!-- Simulasi Kredit Content -->
    <div class="tab-pane fade" id="pills-simulasi-kredit" role="tabpanel" aria-labelledby="pills-simulasi-kredit-tab">
      <div class="kredit-content">
        <h3>Form Simulasi Kredit</h3>
        <div class="simulation-calculator mt-4">
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
      </div>
      <div class="angsuran-container mt-5">
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
    @foreach($kreditData as $index => $kredit)
    @if(strtolower($kredit->judul) === 'modal usaha')
    <div class="tab-pane fade" id="pills-{{ Str::slug($kredit->judul) }}" role="tabpanel"
      aria-labelledby="pills-{{ Str::slug($kredit->judul) }}-tab">
      <div class="kredit-content">
        <!-- Menampilkan Gambar -->
        <div class="kredit-image mb-4 d-flex justify-content-center">
          <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}" class="img-fluid">
        </div>

        <h3>{{ $kredit->judul }}</h3>
        <div class="kredit-info-box">
          <h4>Keunggulan {{ $kredit->judul }}:</h4>
          <p>{!! $kredit->keterangan !!}</p>
        </div>
      </div>
    </div>
    @endif
    @if(strtolower($kredit->judul) === 'kredit komsumtif')
    <div class="tab-pane fade" id="pills-{{ Str::slug($kredit->judul) }}" role="tabpanel"
      aria-labelledby="pills-{{ Str::slug($kredit->judul) }}-tab">
      <div class="kredit-content">
        <!-- Menampilkan Gambar -->
        <div class="kredit-image mb-4 d-flex justify-content-center">
          <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}" class="img-fluid">
        </div>

        <h3>{{ $kredit->judul }}</h3>
        <div class="kredit-info-box">
          <h4>Keunggulan {{ $kredit->judul }}:</h4>
          <p>{!! $kredit->keterangan !!}</p>
        </div>
      </div>
    </div>
    @endif
    @if(strtolower($kredit->judul) === 'kredit sepeda motor')
    <div class="tab-pane fade" id="pills-{{ Str::slug($kredit->judul) }}" role="tabpanel"
      aria-labelledby="pills-{{ Str::slug($kredit->judul) }}-tab">
      <div class="kredit-content">
        <!-- Menampilkan Gambar -->
        <div class="kredit-image mb-4 d-flex justify-content-center">
          <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}" class="img-fluid">
        </div>

        <h3>{{ $kredit->judul }}</h3>
        <div class="kredit-info-box">
          <h4>Keunggulan {{ $kredit->judul }}:</h4>
          <p>{!! $kredit->keterangan !!}</p>
        </div>
      </div>
    </div>
    @endif
    @if(strtolower($kredit->judul) === 'sertifikasi guru')
    <div class="tab-pane fade" id="pills-{{ Str::slug($kredit->judul) }}" role="tabpanel"
      aria-labelledby="pills-{{ Str::slug($kredit->judul) }}-tab">
      <div class="kredit-content">
        <!-- Menampilkan Gambar -->
        <div class="kredit-image mb-4 d-flex justify-content-center">
          <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}" class="img-fluid">
        </div>

        <h3>{{ $kredit->judul }}</h3>
        <div class="kredit-info-box">
          <h4>Keunggulan {{ $kredit->judul }}:</h4>
          <p>{!! $kredit->keterangan !!}</p>
        </div>
      </div>
    </div>
    @endif
    @if(strtolower($kredit->judul) === 'multiguna')
    <div class="tab-pane fade" id="pills-{{ Str::slug($kredit->judul) }}" role="tabpanel"
      aria-labelledby="pills-{{ Str::slug($kredit->judul) }}-tab">
      <div class="kredit-content">
        <!-- Menampilkan Gambar -->
        <div class="kredit-image mb-4 d-flex justify-content-center">
          <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}" class="img-fluid">
        </div>

        <h3>{{ $kredit->judul }}</h3>
        <div class="kredit-info-box">
          <h4>Keunggulan {{ $kredit->judul }}:</h4>
          <p>{!! $kredit->keterangan !!}</p>
        </div>
      </div>
    </div>
    @endif
    @endforeach




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
  @endsection