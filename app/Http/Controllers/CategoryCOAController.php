<?php

namespace App\Http\Controllers;

use App\Models\CategoryCOA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryCOAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categoryCOA.index');
    }

    public function readData()
    {
        return view('categoryCOA.tbody', [
            'datas' => CategoryCOA::get(),
        ]);
    }

    public function showForm(Request $request)
    {
        if (!$request->id) {
            return view('categoryCOA.form-add');
        } else {
            return view('categoryCOA.form-edit', [
                'data' => CategoryCOA::where('id', $request->id)->first(),
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
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('category-coa/showForm')->withErrors($validator)->withInput();
        } else {
            CategoryCOA::create($validator->validate());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryCOA  $categoryCOA
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryCOA $categoryCOA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryCOA  $categoryCOA
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryCOA $categoryCOA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryCOA  $categoryCOA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categoryCOA = CategoryCOA::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), [
            'name' => $request->name == $categoryCOA->name ? 'required' : 'required|unique:category_c_o_a_s',
        ]);

        if ($validator->fails()) {
            return redirect('category-coa/showForm?id=' . $categoryCOA->id)->withErrors($validator)->withInput();
        } else {
            CategoryCOA::where('id', $categoryCOA->id)->update($validator->validate());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryCOA  $categoryCOA
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CategoryCOA $categoryCOA)
    {
        CategoryCOA::destroy($request->id);
    }
}
