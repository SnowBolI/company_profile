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
            .deposit-info-box {
                background-color: #E3F2FD;
                padding: 20px;
                border-radius: 8px;
                margin: 15px 0;
            }

            .deposit-info-box ul {
                list-style-type: none;
                padding-left: 0;
            }

            .deposit-info-box ul li {
                margin-bottom: 10px;
                padding-left: 25px;
                position: relative;
            }

            .deposit-info-box ul li:before {
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
            .deposit-cta-button {
                background-color: #1976D2;
                color: white;
                padding: 12px 25px;
                border-radius: 5px;
                border: none;
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .deposit-cta-button:hover {
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
<section id="hero">
    <div class="hero-container">
        <h1>Tabungan</h1>
        <h2>Produk tabungan kami</h2>
    </div>
</section>
@endsection


@section('content')
    <section id="tabungan">
        <div class="nav-wrapper">
            <div class="container">
                <ul class="nav nav-pills mb-0 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-pembukaan-tabungan-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-pembukaan-tabungan" type="button" role="tab" 
                            aria-controls="pills-pembukaan-tabungan" aria-selected="true">
                        <i class="fas fa-user-plus"></i> Pembukaan Tabungan <!-- Icon for account opening -->
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-simulasi-tabungan-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-simulasi-tabungan" type="button" role="tab" 
                                aria-controls="pills-simulasi-tabungan" aria-selected="false">
                            <i class="fas fa-chart-line"></i> Simulasi Tabungan <!-- Icon for savings simulation -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-SIMPEL-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-SIMPEL" type="button" role="tab" 
                                aria-controls="pills-SIMPEL" aria-selected="false">
                            <i class="fas fa-thumbs-up"></i> SIMPEL <!-- Icon for popular product -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tabungan-sisa-belanja-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-tabungan-sisa-belanja" type="button" role="tab" 
                                aria-controls="pills-tabungan-sisa-belanja" aria-selected="false">
                            <i class="fas fa-wallet"></i> Tabungan Sisa Belanja <!-- Icon for leftover savings -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-tabungan-sukarela-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-tabungan-sukarela" type="button" role="tab" 
                                aria-controls="pills-tabungan-sukarela" aria-selected="false">
                            <i class="fas fa-hand-holding-usd"></i> Tabungan Sukarela <!-- Icon for voluntary savings -->
                        </button>
                    </li>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <!-- Pembukaan Tabungan Content -->
            <div class="tab-pane fade show active" id="pills-pembukaan-tabungan" role="tabpanel" 
                aria-labelledby="pills-pembukaan-tabungan-tab">
                <div class="tabungan-content">
                    <h3>Pembukaan Tabungan</h3>
                    <form class="tabungan-form mt-4">
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
                        <div class="form-group mt-3">
                            <label for="jenis-tabungan">Pilih Tabungan</label>
                            <select class="form-control" id="jenis-tabungan">
                                <option value="simPel">SIMPEL</option>
                                <option value="sisaBelanja">Tabungan Sisa Belanja</option>
                                <option value="sukarela">Tabungan Sukarela</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="setoran">Besar Setoran Awal</label>
                            <input type="number" class="form-control" id="setoran" placeholder="Masukkan besar setoran awal">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 w-100">Kirim</button>
                    </form>
                </div>
            </div>


            <!-- Simulasi Tabungan Content -->
            <div class="tab-pane fade" id="pills-simulasi-tabungan" role="tabpanel" 
            aria-labelledby="pills-simulasi-tabungan-tab">
            <div class="tabungan-content">
                <h3>Simulasi Tabungan</h3>
                <div class="simulation-calculator">
                    <div class="form-group mb-3">
                        <label for="jangka-waktu">Pilih Tabungan</label>
                        <select class="form-control" id="jangka-waktu">
                            <option value="0">-- Pilih Tabungan --</option>
                            <option value="12">Tabungan Sisa Belanja / 12 Bulan</option>
                            <option value="24">SIMPEL / 12 Bulan</option>
                            <option value="36">Tabungan Sukarela / 12 Bulan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="setoran-bulanan">Jumlah Dana</label>
                        <input type="number" class="form-control" id="setoran-bulanan" placeholder="Masukkan nominal jumlah dana">
                    </div>
                    <button class="tabungan-cta-button" id="hitung-simulasi">Hitung Simulasi</button>
                    <div class="simulation-result mt-4" style="display: none;">
                        <h4>Hasil Simulasi</h4>
                        <div class="result-box">
                            <div class="result-item">
                                <span>Total Tabungan</span>
                                <strong id="total-tabungan">Rp 0</strong>
                            </div>
                            <div class="result-item">
                                <span>Estimasi Bunga</span>
                                <strong id="total-bunga">Rp 0</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('hitung-simulasi').addEventListener('click', function() {
                // Get selected tabungan and dana input values
                const jangkaWaktu = parseInt(document.getElementById('jangka-waktu').value);
                const dana = parseFloat(document.getElementById('setoran-bulanan').value);

                // Check if inputs are valid
                if (jangkaWaktu === 0 || isNaN(dana) || dana <= 0) {
                    alert('Mohon pilih tabungan dan masukkan jumlah dana yang valid.');
                    return;
                }

                // Calculate total tabungan and bunga (this can be customized)
                let bungaRate = 0.05; // Example bunga rate per year
                let totalTabungan = dana * jangkaWaktu;
                let estimasiBunga = totalTabungan * bungaRate;

                // Display results
                document.getElementById('total-tabungan').textContent = 'Rp ' + totalTabungan.toFixed(2);
                document.getElementById('total-bunga').textContent = 'Rp ' + estimasiBunga.toFixed(2);

                // Show simulation result
                document.querySelector('.simulation-result').style.display = 'block';
            });
        </script>

            <!-- SIMPEL Content -->
        <div class="tab-pane fade" id="pills-SIMPEL" role="tabpanel" 
            aria-labelledby="pills-SIMPEL-tab">
            <div class="tabungan-content">
                <!-- Image Added Above the Text -->
                <div class="tabungan-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="SIMPEL Tabungan" class="img-fluid">
                </div>

                <h3>SIMPEL (Simpanan Pelajar)</h3>
                <div class="tabungan-info-box">
                    <h4>Keunggulan SIMPEL:</h4>
                    <ul>
                        <li>Tanpa biaya administrasi bulanan</li>
                        <li>Setoran awal ringan Rp 10.000</li>
                        <li>Setoran selanjutnya minimal Rp 1.000</li>
                        <li>Gratis kartu ATM pertama</li>
                        <li>Bunga tabungan menarik</li>
                    </ul>
                </div>
                <div class="requirement-box mt-4">
                    <h4>Persyaratan:</h4>
                    <ul>
                        <li>Pelajar usia di bawah 17 tahun</li>
                        <li>Kartu Pelajar/Surat Keterangan Sekolah</li>
                        <li>Kartu identitas orang tua</li>
                        <li>Mengisi formulir pembukaan rekening</li>
                    </ul>
                </div>
            </div>
        </div>


            <!-- Tabungan Sisa Belanja Content -->
            <div class="tab-pane fade" id="pills-tabungan-sisa-belanja" role="tabpanel" 
                aria-labelledby="pills-tabungan-sisa-belanja-tab">
                <div class="tabungan-content">
                <div class="tabungan-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="Tabungan Sisa Belanja" class="img-fluid">
                </div>
                    <h3>Tabungan Sisa Belanja</h3>
                    <div class="benefit-box">
                        <h4>Manfaat:</h4>
                        <ul>
                            <li>Pembulatan transaksi belanja otomatis masuk tabungan</li>
                            <li>Tanpa setoran awal</li>
                            <li>Bebas biaya administrasi</li>
                            <li>Dapat diintegrasikan dengan rekening utama</li>
                        </ul>
                    </div>
                    <div class="feature-info mt-4">
                        <h4>Fitur:</h4>
                        <ul>
                            <li>Pembulatan otomatis ke atas (Rp 1.000)</li>
                            <li>Notifikasi setiap transaksi</li>
                            <li>Laporan tabungan bulanan</li>
                            <li>Akses melalui mobile banking</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tabungan Sukarela Content -->
            <div class="tab-pane fade" id="pills-tabungan-sukarela" role="tabpanel" 
                aria-labelledby="pills-tabungan-sukarela-tab">
                <div class="tabungan-content">
                <div class="tabungan-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="Tabungan Sukarela" class="img-fluid">
                </div>
                    <h3>Tabungan Sukarela</h3>
                    <div class="benefit-box">
                        <h4>Manfaat:</h4>
                        <ul>
                            <li>Setoran dan penarikan fleksibel</li>
                            <li>Bebas biaya administrasi</li>
                            <li>Suku bunga kompetitif</li>
                            <li>Dapat dijadikan jaminan kredit</li>
                        </ul>
                    </div>
                    <div class="feature-info mt-4">
                        <h4>Fitur:</h4>
                        <ul>
                            <li>Setoran awal Rp 25.000</li>
                            <li>Fasilitas auto debet</li>
                            <li>Layanan e-banking</li>
                            <li>Kartu ATM dengan limit yang dapat disesuaikan</li>
                        </ul>
                    </div>
                    <div class="interest-info mt-4">
                        <h4>Suku Bunga:</h4>
                        <div class="interest-rate">3.5% p.a</div>
                        <p class="mt-3">*Suku bunga dapat berubah sewaktu-waktu</p>
                    </div>
                </div>
            </div>
        </div>

@endsection