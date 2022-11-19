<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category_product.index');
    }

    public function readData()
    {
        return view('admin.category_product.tbody',[
            'category' => CategoryProduct::get(),
        ]);
    }

    public function showForm(Request $request)
    {
        if(!$request->id){
            return view('admin.category_product.form-add');
        } else {
            return view('admin.category_product.form-edit', [
                'data' => CategoryProduct::where('id', $request->id)->first(),
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
            'name' => 'required|unique:category_products',
        ]);

        if ($validator->fails()) {
            return redirect('category-product/showForm')->withErrors($validator)->withInput();
        } else {
            CategoryProduct::create($validator->validate());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        $validator = Validator::make($request->all(), [
            'name' => $request->name == $categoryProduct->name ? 'required' : 'required|unique:category_products',
        ]);

        if ($validator->fails()) {
            return redirect('category-product/showForm?id='.$categoryProduct->id)->withErrors($validator)->withInput();
        } else {
            CategoryProduct::where('id', $categoryProduct->id)->update($validator->validate());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        Product::where('category_id', $categoryProduct->id)->update(["category_id" => null]);
        CategoryProduct::destroy($categoryProduct->id);
    }
}
