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
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
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
            padding: 0; /* Remove default padding */
            justify-content: center; 
        }

        /* Reset nav item styles */
        .nav-item {
            width: 100%;
            margin: 0; /* Remove default margins */
            padding: 0; /* Remove default padding */
            list-style: none; /* Remove list styling */
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
            border: none; /* Remove border */
            outline: none; /* Remove outline */
            margin: 0; /* Remove margins */
            text-decoration: none; /* Remove text decoration */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative; /* For hover effect */
            overflow: hidden; /* Ensure no content spills out */
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Hover state */
        .nav-pills .nav-link:hover {
            transform: translateY(-3px);
            background-color: #FFC107;
            color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        /* Remove focus outline */
        .nav-pills .nav-link:focus {
            outline: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
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
        .nav-pills .show > .nav-link {
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
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
                border-bottom: 1px solid rgba(0,0,0,0.1);
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
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
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

                .jadwal-angsuran, .tabel-angsuran {
                    background-color: #ffffff;
                    border-radius: 8px;
                    border: 1px solid #e2e2e2;
                }

                .jadwal-angsuran h4, .tabel-angsuran h4 {
                    font-weight: bold;
                    color: #333;
                }

                .jadwal-angsuran p, .tabel-angsuran th, .tabel-angsuran td {
                    color: #666;
                }

                .table th, .table td {
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
            <h1>Tentang Kami</h1>
            <h2>Informasi profil bank</h2>
        </div>
    </section>
@endforeach
@else
<section id="hero">
    <div class="hero-container">
        <h1>Tentang Kami</h1>
        <h2>Informasi profil bank</h2>
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
                            data-bs-target="#pills-pengajuan-kredit" type="button" role="tab" 
                            aria-controls="pills-pengajuan-kredit" aria-selected="true">
                        <i class="fas fa-file-signature"></i> Pengajuan Kredit <!-- Icon for loan application -->
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-simulasi-kredit-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-simulasi-kredit" type="button" role="tab" 
                            aria-controls="pills-simulasi-kredit" aria-selected="false">
                        <i class="fas fa-calculator"></i> Simulasi Kredit <!-- Icon for credit simulation -->
                    </button>
                </li>
                @foreach($kreditData as $index => $kredit)
                @if(strtolower($kredit->judul) === 'modal usaha')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($kredit->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-briefcase"></i> {{ $kredit->judul }}
                    </button>
                </li>
                @endif

                @if(strtolower($kredit->judul) === 'kredit komsumtif')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($kredit->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-shopping-cart"></i> {{ $kredit->judul }}
                    </button>
                </li>
                @endif

                @if(strtolower($kredit->judul) === 'kredit sepeda motor')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($kredit->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-motorcycle"></i> {{ $kredit->judul }}
                    </button>
                </li>
                @endif
                @if(strtolower($kredit->judul) === 'sertifikasi guru')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($kredit->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-chalkboard-teacher"></i> {{ $kredit->judul }}
                    </button>
                </li>
                @endif
                @if(strtolower($kredit->judul) === 'multiguna')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($kredit->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($kredit->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($kredit->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
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
                    <form class="kredit-form mt-4">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group mt-3">
                            <label for="ktp">No. KTP</label>
                            <input type="text" class="form-control" id="ktp" placeholder="Masukkan nomor KTP">
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="2" placeholder="Masukkan alamat"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="hp">No. HP</label>
                            <input type="text" class="form-control" id="hp" placeholder="Masukkan nomor HP">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email">
                        </div>
                        <!-- Additional Loan Fields -->
                        <div class="form-group mt-3">
                            <label for="jumlah-pinjaman">Jumlah Pinjaman</label>
                            <input type="number" class="form-control" id="jumlah-pinjaman" placeholder="Masukkan jumlah pinjaman">
                        </div>
                        <div class="form-group mt-3">
                            <label for="jangka-waktu">Jangka Waktu Pinjaman (Bulan)</label>
                            <input type="number" class="form-control" id="jangka-waktu" placeholder="Masukkan jangka waktu pinjaman dalam bulan">
                        </div>
                        <div class="form-group mt-3">
                            <label for="tujuan-pinjaman">Tujuan Pinjaman</label>
                            <textarea class="form-control" id="tujuan-pinjaman" rows="2" placeholder="Masukkan tujuan pinjaman"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="jaminan">Jaminan</label>
                            <textarea class="form-control" id="jaminan" rows="2" placeholder="Masukkan jaminan"></textarea>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-4 w-100">Kirim</button>
                    </form>
                </div>
            </div>


                <!-- Simulasi Kredit Content -->
                <div class="tab-pane fade" id="pills-simulasi-kredit" role="tabpanel" 
                    aria-labelledby="pills-simulasi-kredit-tab">
                    <div class="kredit-content">
                        <h3>Form Simulasi Kredit</h3>
                        <div class="simulation-calculator mt-4">
                            <div class="form-group mb-3">
                                <label for="jumlah-pinjaman">Jumlah Pinjaman</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="jumlah-pinjaman" placeholder="ex: 50.000.000">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Rupiah</span>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Jumlah pinjaman minimal Rp 0</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lama-pinjaman">Lama Pinjaman</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="lama-pinjaman" placeholder="ex: 12">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                </div>
                                <small class="form-text text-muted">Maksimal lama pinjaman bulan</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="bunga-pinjaman">Bunga Pinjaman</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="bunga-pinjaman" placeholder="ex: 5">
                                    <div class="input-group-append">
                                        <span class="input-group-text">% per Tahun</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="mulai-meminjam">Mulai Meminjam</label>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" id="bulan-meminjam">
                                            <option>- Bulan -</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" id="tahun-meminjam">
                                            <option>- Tahun -</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <!-- Add more years as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="perhitungan-bunga">Perhitungan Bunga</label>
                                <select class="form-control" id="perhitungan-bunga">
                                    <option value="tetap">Tetap</option>
                                    <option value="anuitas">Anuitas</option>
                                    <option value="menurun">Menurun</option>
                                </select>
                            </div>
                            <button class="btn btn-success w-100 mt-3" id="kalkulasi-button">Kalkulasi</button>
                            <div class="simulation-result mt-4" style="display: none;">
                                <h4>Hasil Simulasi</h4>
                                <div class="result-box">
                                    <div class="result-item">
                                        <span>Angsuran per Bulan</span>
                                        <strong id="angsuran-bulanan">Rp 0</strong>
                                    </div>
                                    <div class="result-item">
                                        <span>Total Bunga</span>
                                        <strong id="total-bunga">Rp 0</strong>
                                    </div>
                                    <div class="result-item">
                                        <span>Total Pembayaran</span>
                                        <strong id="total-pembayaran">Rp 0</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="angsuran-container mt-5">
                    <!-- Jadwal Angsuran Section -->
                    <div class="jadwal-angsuran p-4 mb-4">
                        <h4>Jadwal Angsuran</h4>
                        <div class="row">
                            <div class="col-md-3">
                                <p>Bunga Pinjaman Per Tahun</p>
                                <strong id="bunga-tahun">0</strong>
                            </div>
                            <div class="col-md-3">
                                <p>Jangka Waktu Pinjaman</p>
                                <strong id="jangka-waktu">0</strong>
                            </div>
                            <div class="col-md-3">
                                <p>Pokok Pinjaman</p>
                                <strong id="pokok-pinjaman">0</strong>
                            </div>
                            <div class="col-md-3">
                                <p>Tanggal Pinjaman</p>
                                <strong id="tanggal-pinjaman">0</strong>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <p>Tenggang Waktu Pembayaran</p>
                                <strong id="tenggang-waktu">1 Bulan</strong>
                            </div>
                            <div class="col-md-3">
                                <p>Angsuran per Bulan</p>
                                <strong id="angsuran-bulan">0</strong>
                            </div>
                            <div class="col-md-6">
                                <p>Perhitungan Bunga</p>
                                <div>
                                    <label><input type="radio" name="bunga" value="tetap"> Tetap</label>
                                    <label><input type="radio" name="bunga" value="anuitas"> Anuitas</label>
                                    <label><input type="radio" name="bunga" value="menurun"> Menurun</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Angsuran Section -->
                    <div class="tabel-angsuran p-4">
                        <h4>Tabel Angsuran</h4>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Bulan Ke-</th>
                                    <th>Bulan</th>
                                    <th>Pokok Pinjaman</th>
                                    <th>Cicilan Pokok Pinjaman</th>
                                    <th>Bunga</th>
                                    <th>Angsuran per Bulan</th>
                                    <th>Saldo Pokok Pinjaman</th>
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
                                <!-- Additional rows can be generated dynamically based on simulation results -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @foreach($kreditData as $index => $kredit)
            @if(strtolower($kredit->judul) === 'modal usaha')
            <div class="tab-pane fade" id="pills-{{ Str::slug($kredit->judul) }}" role="tabpanel"
                aria-labelledby="pills-{{ Str::slug($kredit->judul) }}-tab">
                <div class="kredit-content">
                    <!-- Menampilkan Gambar -->
                    <div class="kredit-image mb-4 d-flex justify-content-center">
                        <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}"
                            class="img-fluid">
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
                        <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}"
                            class="img-fluid">
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
                        <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}"
                            class="img-fluid">
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
                        <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}"
                            class="img-fluid">
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
                        <img src="{{ asset('storage/' . $kredit->gambar) }}" alt="{{ $kredit->judul }}"
                            class="img-fluid">
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

@endsection
