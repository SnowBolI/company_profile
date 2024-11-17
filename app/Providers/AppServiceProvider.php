<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\PesanKontak;
use App\Models\PesanDeposito;
use App\Models\PesanKredit;
use App\Models\PesanTabungan;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);
        // Ambil data yang ingin dibagikan
        $kontakCount = PesanKontak::where('status', 'belum dibaca')->count();
        $tabunganCount = PesanTabungan::where('status', 'belum dibaca')->count();
        $depositoCount = PesanDeposito::where('status', 'belum dibaca')->count();
        $kreditCount = PesanKredit::where('status', 'belum dibaca')->count();
        $totalNotifications = $kontakCount + $tabunganCount + $depositoCount +$kreditCount;

        // Share data ke seluruh view
        View::share('dashboardData', [
            'kontak' => $kontakCount,
            'tabungan' => $tabunganCount,
            'deposito' => $depositoCount,
            'kredit' => $kreditCount,
            'total' => $totalNotifications,
            'notifications' => collect([
                ...PesanKontak::where('status', 'belum dibaca')->latest()->take(5)->get(),
                ...PesanTabungan::where('status', 'belum dibaca')->latest()->take(5)->get(),
                ...PesanDeposito::where('status', 'belum dibaca')->latest()->take(5)->get(),
                ...PesanKredit::where('status', 'belum dibaca')->latest()->take(5)->get(),

            ])->sortByDesc('tanggal')->take(5)
        ]);
    }
}
