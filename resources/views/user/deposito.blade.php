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
        <h1>Deposito</h1>
        <h2>Produk deposito kami</h2>
    </div>
</section>
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-DeBesT-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-DeBesT" type="button" role="tab" 
                                aria-controls="pills-DeBesT" aria-selected="false">
                            <i class="fas fa-star"></i> DeBesT <!-- Ikon bintang untuk produk unggulan -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-deposito-6bulan-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-deposito-6bulan" type="button" role="tab" 
                                aria-controls="pills-deposito-6bulan" aria-selected="false">
                            <i class="fas fa-calendar-alt"></i> Deposito Berjangka 6 bulan <!-- Ikon kalender -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-deposito-3bulan-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-deposito-3bulan" type="button" role="tab" 
                                aria-controls="pills-deposito-3bulan" aria-selected="false">
                            <i class="fas fa-calendar-check"></i> Deposito Berjangka 3 bulan <!-- Ikon kalender cek -->
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-deposito-1bulan-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-deposito-1bulan" type="button" role="tab" 
                                aria-controls="pills-deposito-1bulan" aria-selected="false">
                            <i class="fas fa-calendar-day"></i> Deposito Berjangka 1 bulan <!-- Ikon kalender harian -->
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <!-- Pengajuan Deposito Content -->
            <div class="tab-pane fade show active" id="pills-pengajuan-deposito" role="tabpanel" 
                aria-labelledby="pills-pengajuan-deposito-tab">
                <div class="tabungan-content">
                    <h3>Pengajuan Deposito</h3>
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
                            <label for="jenis-deposito">Pilih Jenis Deposito</label>
                            <select class="form-control" id="jenis-deposito">
                                <option value="DeBesT">DeBesT</option>
                                <option value="jangkaMenengah">Deposito Berjangka 12 Bulan</option>
                                <option value="jangkaPanjang">Deposito Berjangka 6 Bulan</option>
                                <option value="jangkaPanjang">Deposito Berjangka 3 Bulan</option>
                                <option value="jangkaPanjang">Deposito Berjangka 1 Bulan</option>
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
            <div class="tab-pane fade" id="pills-DeBesT" role="tabpanel" 
                aria-labelledby="pills-DeBesT-tab">
                <div class="deposito-content">
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="debest" class="img-fluid">
                </div>
                    <h3>DeBesT (Deposito Berjangka Special Rate)</h3>
                    <div class="deposit-info-box">
                        <h4>Keunggulan DeBesT:</h4>
                        <ul>
                            <li>Suku bunga special hingga 7% p.a</li>
                            <li>Jangka waktu fleksibel</li>
                            <li>Pembayaran bunga di muka</li>
                            <li>Dapat dijadikan jaminan kredit</li>
                        </ul>
                    </div>
                    <div class="rate-table mt-4">
                        <h4>Special Rate:</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nominal</th>
                                    <th>Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>> Rp 100 Juta</td>
                                    <td>6.5% p.a</td>
                                </tr>
                                <tr>
                                    <td>> Rp 500 Juta</td>
                                    <td>7.0% p.a</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Deposito 6 Bulan Content -->
            <div class="tab-pane fade" id="pills-deposito-6bulan" role="tabpanel" 
                aria-labelledby="pills-deposito-6bulan-tab">
                <div class="deposito-content">
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="deposito 6 bulan" class="img-fluid">
                </div>
                    <h3>Deposito Berjangka 6 Bulan</h3>
                    <div class="benefit-box">
                        <h4>Manfaat:</h4>
                        <ul>
                            <li>Suku bunga kompetitif</li>
                            <li>Jangka waktu optimal</li>
                            <li>Bunga dapat ditransfer ke rekening tabungan</li>
                        </ul>
                    </div>
                    <div class="interest-info mt-4">
                        <h4>Suku Bunga:</h4>
                        <div class="interest-rate">5.75% p.a</div>
                        <p class="mt-3">*Suku bunga dapat berubah sewaktu-waktu</p>
                    </div>
                </div>
            </div>

            <!-- Deposito 3 Bulan Content -->
            <div class="tab-pane fade" id="pills-deposito-3bulan" role="tabpanel" 
                aria-labelledby="pills-deposito-3bulan-tab">
                <div class="deposito-content">
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="deposito 3 bulan" class="img-fluid">
                </div>
                    <h3>Deposito Berjangka 3 Bulan</h3>
                    <div class="benefit-box">
                        <h4>Manfaat:</h4>
                        <ul>
                            <li>Fleksibilitas lebih tinggi</li>
                            <li>Suku bunga menarik</li>
                            <li>Perpanjangan otomatis (ARO)</li>
                        </ul>
                    </div>
                    <div class="interest-info mt-4">
                        <h4>Suku Bunga:</h4>
                        <div class="interest-rate">5.50% p.a</div>
                        <p class="mt-3">*Suku bunga dapat berubah sewaktu-waktu</p>
                    </div>
                </div>
            </div>

            <!-- Deposito 1 Bulan Content -->
            <div class="tab-pane fade" id="pills-deposito-1bulan" role="tabpanel" 
                aria-labelledby="pills-deposito-1bulan-tab">
                <div class="deposito-content">
                <div class="deposito-image mb-4 d-flex justify-content-center">
                    <img src="/user/images/destination.png" alt="deposito 1 bulan" class="img-fluid">
                </div>
                    <h3>Deposito Berjangka 1 Bulan</h3>
                    <div class="benefit-box">
                        <h4>Manfaat:</h4>
                        <ul>
                            <li>Jangka waktu pendek</li>
                            <li>Likuiditas tinggi</li>
                            <li>Pengelolaan dana lebih fleksibel</li>
                        </ul>
                    </div>
                    <div class="interest-info mt-4">
                        <h4>Suku Bunga:</h4>
                        <div class="interest-rate">5.25% p.a</div>
                        <p class="mt-3">*Suku bunga dapat berubah sewaktu-waktu</p>
                    </div>
                </div>
            </div>
        </div>

@endsection