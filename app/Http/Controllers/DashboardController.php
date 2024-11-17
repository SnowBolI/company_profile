<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\PesanKontak;
use App\Models\PesanKredit;
use Illuminate\Http\Request;
use App\Models\PesanDeposito;
use App\Models\PesanTabungan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Get counts for the notifications
    $kontakCount = PesanKontak::where('status', 'belum dibaca')->count();
    $tabunganCount = PesanTabungan::where('status', 'belum dibaca')->count();
    $depositoCount = PesanDeposito::where('status', 'belum dibaca')->count();
    $kreditCount = PesanKredit::where('status', 'belum dibaca')->count();
    $totalNotifications = $kontakCount + $tabunganCount + $depositoCount +$kreditCount;
    $monthlyCountsKontak = PesanKontak::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');
    $monthlyCountsTabungan = PesanTabungan::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');
    $monthlyCountsDeposito = PesanDeposito::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');
    $monthlyCountsKredit = PesanKredit::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');

    // Fetch the latest 5 notifications, for example from Articles and PesanKontak
    $notifications = collect([
        ...PesanKontak::where('status', 'belum dibaca')->latest()->take(5)->get(),
        ...PesanTabungan::where('status', 'belum dibaca')->latest()->take(5)->get(),
        ...Article::whereIn('status', ['DRAFT', 'PUBLISH'])->latest()->take(5)->get()
    ])->sortByDesc('tanggal')->take(5); // Sort by creation date and get the 5 most recent

    // Pass the data to the view
    $data = [
        'kontak'     => $kontakCount,
        'tabungan'     => $tabunganCount,
        'total'      => $totalNotifications,
        'notifications' => $notifications,
        'charts' => [
            'kontak'   => $monthlyCountsKontak,
            'tabungan' => $monthlyCountsTabungan,
            'deposito' => $monthlyCountsDeposito,
            'kredit'   => $monthlyCountsKredit,
        ],
    ];

    return view('dashboards.index', ['data' => $data]);
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
