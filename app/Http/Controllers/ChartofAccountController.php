<?php

namespace App\Http\Controllers;

use App\Models\CategoryCOA;
use App\Models\ChartofAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChartofAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('COA.index');
    }

    public function readData()
    {
        return view('COA.tbody', [
            'datas' => ChartofAccount::with('categoryCOA')->get(),
        ]);
    }

    public function showForm(Request $request)
    {
        if (!$request->id) {
            return view('COA.form-add', [
                'datas' => CategoryCOA::get(),
            ]);
        } else {
            return view('COA.form-edit', [
                'datas' => CategoryCOA::get(),
                'data' => ChartofAccount::where('id', $request->id)->first(),
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
            'name' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('coa/showForm')->withErrors($validator)->withInput();
        } else {
            // $status = CategoryCOA::where('id', $request->kategori)->first();
            // $numIn = ChartofAccount::where('kode', 'like', '%40%')->count();
            // $numEx = ChartofAccount::where('kode', 'like', '%60%')->count();$status->status == 'income' ? '40' . $numIn+1 : '60' . $numEx+1
            $data = [
                'kode' => $request->kode,
                'name' => $request->name,
                'kategori' => $request->kategori,
            ];
            ChartofAccount::create($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChartofAccount  $chartofAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ChartofAccount $chartofAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChartofAccount  $chartofAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartofAccount $chartofAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChartofAccount  $chartofAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ChartofAccount = ChartofAccount::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), [
            'kode' => $request->kode == $ChartofAccount->kode ? 'required' : 'required|unique:chartof_accounts',
            'name' => $request->name == $ChartofAccount->name ? 'required' : 'required|unique:chartof_accounts',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('coa/showForm?id=' . $ChartofAccount->id)->withErrors($validator)->withInput();
        } else {
            // $status = CategoryCOA::where('id', $request->kategori)->first();
            // $numIn = ChartofAccount::where('kode', 'like', '%40%')->count();
            // $numEx = ChartofAccount::where('kode', 'like', '%60%')->count();$status->status == 'income' ? '40' . $numIn + 1 : '60' . $numEx + 1
            $data = [
                'kode' => $request->kode,
                'name' => $request->name,
                'kategori' => $request->kategori,
            ];
            ChartofAccount::where('id', $ChartofAccount->id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChartofAccount  $ChartofAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ChartofAccount::destroy($request->id);
    }
}
