<?php

namespace App\Http\Controllers;

use App\Models\CategoryCOA;
use App\Models\Laporan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = [];

        for($i=0; $i<5; $i++) {
            array_push($bulan, [
                Carbon::today()->subMonths($i)->format('Y-m')
            ]);
        }

        return view('laporan.index', [
            'months' => $bulan
        ]);
    }

    public function readData()
    {
        // $transactions = Transaksi::where('created_at', Carbon::today()->subMonths()->format('Y-m'))->first();
        // return Transaksi::where('created_at', Carbon::today()->subMonths()->format('Y-m'))->first();

        $bulan = [];

        for ($i = 0; $i < 5; $i++) {
            array_push($bulan, [
                Carbon::today()->subMonths($i)->format('Y-m')
            ]);
        }

        return view('laporan.tbody', [
            'categories' => CategoryCOA::where('status', 'income')->get(),
            'kategories' => CategoryCOA::where('status', 'expense')->get(),
            'transactions' => Transaksi::whereBetween('tanggal', ['2022-10-01', '2022-10-30'])->get(),
            'months' => $bulan
        ]);
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
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
