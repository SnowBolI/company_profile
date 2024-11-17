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
            grid-template-columns: repeat(3, 1fr);
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

            .deposito-content {
                background-color: #ffffff;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            }

            /* Info Box Styling */
            .deposito-info-box {
                background-color: #E3F2FD;
                padding: 20px;
                border-radius: 8px;
                margin: 15px 0;
            }

            .deposito-info-box ul {
                list-style-type: none;
                padding-left: 0;
            }

            .deposito-info-box ul li {
                margin-bottom: 10px;
                padding-left: 25px;
                position: relative;
            }

            .deposito-info-box ul li:before {
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
            .deposito-cta-button {
                background-color: #1976D2;
                color: white;
                padding: 12px 25px;
                border-radius: 5px;
                border: none;
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .deposito-cta-button:hover {
                background-color: #1565C0;
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .deposito-content {
                    padding: 20px;
                }

                .step-cards {
                    grid-template-columns: 1fr;
                }

                .interest-rate {
                    font-size: 28px;
                }
            }
    </style>
@endsection


@section('hero')
@if($produkSliders->isNotEmpty())
@foreach($produkSliders as $slider)
    <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
        <div class="hero-container">
            <h1>Deposito</h1>
            <h2></h2>
        </div>
    </section>
@endforeach
@else
<section id="hero">
    <div class="hero-container">
        <h1>Deposito</h1>
        <h2></h2>
    </div>
</section>
@endif
@endsection

@section('content')
    <section id="deposito">
        <div class="nav-wrapper">
            <div class="container">
                <ul class="nav nav-pills mb-0 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pengajuan-deposito-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-pengajuan-deposito" type="button" role="tab" 
                                aria-controls="pills-pengajuan-deposito" aria-selected="true">
                            <i class="fas fa-file-alt"></i> Pengajuan Deposito <!-- Ikon pengajuan -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-simulasi-deposito-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-simulasi-deposito" type="button" role="tab" 
                                aria-controls="pills-simulasi-deposito" aria-selected="false">
                            <i class="fas fa-calculator"></i> Simulasi Deposito <!-- Ikon kalkulator -->
                        </button>
                    </li>
                    @foreach($depositoData as $index => $deposito)
                @if(strtolower($deposito->judul) === 'debest')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($deposito->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($deposito->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($deposito->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-star"></i> {{ $deposito->judul }}
                    </button>
                </li>
                @endif

                @if(strtolower($deposito->judul) === 'deposito berjangka 6 bulan')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($deposito->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($deposito->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($deposito->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-calender-alt"></i> {{ $deposito->judul }}
                    </button>
                </li>
                @endif

                @if(strtolower($deposito->judul) === 'deposito berjangka 3 bulan')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($deposito->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($deposito->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($deposito->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-calender-check"></i> {{ $deposito->judul }}
                    </button>
                </li>
                @endif
                @if(strtolower($deposito->judul) === 'deposito berjangka 1 bulan')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-{{ Str::slug($deposito->judul) }}-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::slug($deposito->judul) }}" type="button" role="tab"
                        aria-controls="pills-{{ Str::slug($deposito->judul) }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        <i class="fas fa-calender-day"></i> {{ $deposito->judul }}
                    </button>
                </li>
                @endif
                @endforeach
                    
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <!-- Pengajuan Deposito Content -->
            <div class="tab-pane fade show active" id="pills-pengajuan-deposito" role="tabpanel" 
                aria-labelledby="pills-pengajuan-deposito-tab">
                <div class="deposito-content">
                    <h3>Pengajuan Deposito</h3>
                    @if (($message = Session::get('message')))
                    <div class="alert alert-success alert-dismissible fade show">
                        <strong>Berhasil!</strong>
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="{{ route('deposito.store') }}" method="post"  class="kredit-form mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group mt-3">
                            <label for="number">No. KTP</label>
                            <input type="text" class="form-control" name="ktp" id="ktp" placeholder="Masukkan nomor KTP">
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="number">No. HP</label>
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan nomor HP">
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="form-group mt-3">
                            <label for="tipe_deposito">Pilih Jenis Deposito</label>
                            <select class="form-control" id="tipe_deposito" name="tipe_deposito">
                                <option value="DeBesT">DeBesT</option>
                                <option value="Deposito Berjangka 12 Bulan">Deposito Berjangka 12 Bulan</option>
                                <option value="Deposito Berjangka 6 Bulan">Deposito Berjangka 6 Bulan</option>
                                <option value="Deposito Berjangka 3 Bulan">Deposito Berjangka 3 Bulan</option>
                                <option value="Deposito Berjangka 1 Bulan">Deposito Berjangka 1 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="setoran_awal">Besar Setoran Awal</label>
                            <input type="number" class="form-control" name="setoran_awal" id="setoran_awal" placeholder="Masukkan besar setoran awal">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Kirim</button>
                    </form>
                </div>
            </div>


           <!-- Simulasi Deposito Content -->
            <div class="tab-pane fade" id="pills-simulasi-deposito" role="tabpanel" aria-labelledby="pills-simulasi-deposito-tab">
                <div class="deposito-content">
                    <h3>Simulasi Deposito</h3>
                    <div class="simulation-calculator">
                        <div class="form-group mb-3">
                            <label for="jangka-waktu">Jangka Waktu</label>
                            <select class="form-control" id="jangka-waktu">
                                <option value="0">- Pilih Deposito -</option>
                                <option value="12">Deposito Berjangka 12 Bulan</option>
                                <option value="6">Deposito Berjangka 6 Bulan</option>
                                <option value="3">Deposito Berjangka 3 Bulan</option>
                                <option value="1">Deposito Berjangka 1 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nominal">Jumlah Dana</label>
                            <input type="number" class="form-control" id="nominal" placeholder="Masukkan nominal">
                        </div>
                        <button class="deposit-cta-button" onclick="calculateDeposit()">Hitung Simulasi</button>
                        <div class="simulation-result mt-4" id="simulation-result" style="display: none;">
                            <h4>Hasil Simulasi</h4>
                            <div class="result-box">
                                <div class="result-item">
                                    <span>Total Bunga</span>
                                    <strong id="total-bunga">Rp 0</strong>
                                </div>
                                <div class="result-item">
                                    <span>Total Dana Akhir</span>
                                    <strong id="total-dana">Rp 0</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function calculateDeposit() {
                    // Get values from input fields
                    const jangkaWaktu = parseInt(document.getElementById("jangka-waktu").value);
                    const jumlahDana = parseFloat(document.getElementById("nominal").value);

                    // Define interest rate (e.g., 5% per year)
                    const interestRate = 5;

                    // Calculate total interest and final amount based on jangka waktu
                    const totalBunga = (jumlahDana * interestRate * jangkaWaktu) / 1200; // Simple interest formula
                    const totalDanaAkhir = jumlahDana + totalBunga;

                    // Format results as currency
                    const formattedBunga = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalBunga);
                    const formattedDanaAkhir = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalDanaAkhir);

                    // Update result elements
                    document.getElementById("total-bunga").textContent = formattedBunga;
                    document.getElementById("total-dana").textContent = formattedDanaAkhir;

                    // Show the result section
                    document.getElementById("simulation-result").style.display = "block";
                }
            </script>


            <!-- DeBesT Content -->
            @foreach($depositoData as $index => $deposito)
        @if(strtolower($deposito->judul) === 'debest')
        <div class="tab-pane fade" id="pills-{{ Str::slug($deposito->judul) }}" role="tabpanel"
            aria-labelledby="pills-{{ Str::slug($deposito->judul) }}-tab">
            <div class="deposito-content">
                <!-- Menampilkan Gambar -->
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $deposito->gambar) }}" alt="{{ $deposito->judul }}"
                        class="img-fluid">
                </div>

                <h3>{{ $deposito->judul }}</h3>
                <div class="deposito-info-box">
                    <h4>Keunggulan {{ $deposito->judul }}:</h4>
                    <p>{!! $deposito->keterangan !!}</p>
                </div>
            </div>
        </div>
        @endif
        @if(strtolower($deposito->judul) === 'deposito berjangka 6 bulan')
        <div class="tab-pane fade" id="pills-{{ Str::slug($deposito->judul) }}" role="tabpanel"
            aria-labelledby="pills-{{ Str::slug($deposito->judul) }}-tab">
            <div class="deposito-content">
                <!-- Menampilkan Gambar -->
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $deposito->gambar) }}" alt="{{ $deposito->judul }}"
                        class="img-fluid">
                </div>

                <h3>{{ $deposito->judul }}</h3>
                <div class="deposito-info-box">
                    <h4>Keunggulan {{ $deposito->judul }}:</h4>
                    <p>{!! $deposito->keterangan !!}</p>
                </div>
            </div>
        </div>
        @endif
        @if(strtolower($deposito->judul) === 'deposito berjangka 3 bulan')
        <div class="tab-pane fade" id="pills-{{ Str::slug($deposito->judul) }}" role="tabpanel"
            aria-labelledby="pills-{{ Str::slug($deposito->judul) }}-tab">
            <div class="deposito-content">
                <!-- Menampilkan Gambar -->
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $deposito->gambar) }}" alt="{{ $deposito->judul }}"
                        class="img-fluid">
                </div>

                <h3>{{ $deposito->judul }}</h3>
                <div class="deposito-info-box">
                    <h4>Keunggulan {{ $deposito->judul }}:</h4>
                    <p>{!! $deposito->keterangan !!}</p>
                </div>
            </div>
        </div>
        @endif
        @if(strtolower($deposito->judul) === 'deposito berjangka 1 bulan')
        <div class="tab-pane fade" id="pills-{{ Str::slug($deposito->judul) }}" role="tabpanel"
            aria-labelledby="pills-{{ Str::slug($deposito->judul) }}-tab">
            <div class="deposito-content">
                <!-- Menampilkan Gambar -->
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $deposito->gambar) }}" alt="{{ $deposito->judul }}"
                        class="img-fluid">
                </div>

                <h3>{{ $deposito->judul }}</h3>
                <div class="deposito-info-box">
                    <h4>Keunggulan {{ $deposito->judul }}:</h4>
                    <p>{!! $deposito->keterangan !!}</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach

@endsection