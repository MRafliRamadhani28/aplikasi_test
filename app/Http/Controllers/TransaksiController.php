<?php

namespace App\Http\Controllers;

use App\Models\CategoryCOA;
use App\Models\ChartofAccount;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.index');
    }

    public function readData()
    {
        return view('transaksi.tbody', [
            'datas' => Transaksi::with('category', 'master')->get(),
        ]);
    }

    public function showForm(Request $request)
    {
        if (!$request->id) {
            return view('transaksi.form-add', [
                'datas' => ChartofAccount::with('categoryCOA')->get(),
            ]);
        } else {
            return view('transaksi.form-edit', [
                'datas' => ChartofAccount::with('categoryCOA')->get(),
                'data' => Transaksi::where('id', $request->id)->first(),
            ]);
        }
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
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'desc' => 'required',
            'debit' => 'required',
            'credit' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('transaksi/showForm')->withErrors($validator)->withInput();
        } else {
            $data = [
                'tanggal' => Carbon::now(),
                'COA_kode' => explode("/", $request->kode)[0],
                'COA_nama' => explode("/", $request->kode)[1],
                'deskripsi' => $request->desc,
                'debit' => $request->debit,
                'credit' => $request->credit,
            ];
            Transaksi::create($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Transaksi = Transaksi::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'desc' => 'required',
            'debit' => 'required',
            'credit' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('transaksi/showForm?id=' . $Transaksi->id)->withErrors($validator)->withInput();
        } else {
            $data = [
                'tanggal' => Carbon::now(),
                'COA_kode' => explode("/", $request->kode)[0],
                'COA_nama' => explode("/", $request->kode)[1],
                'deskripsi' => $request->desc,
                'debit' => $request->debit,
                'credit' => $request->credit,
            ];
            Transaksi::where('id', $Transaksi->id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Transaksi::destroy($request->id);
    }
}
