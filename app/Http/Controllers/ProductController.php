<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Services\GenerateQueryService;

// Model
use  App\Models\Product;

use App\Http\Requests\ProductRequest;

/**
 * ProductControllerクラス
 * 
 * Productテーブルに関する処理を記載する。
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // クエリ作成 (ファットコントローラ対策)
        $query = GenerateQueryService::generateSearch($request);
        
        $products = $query->paginate(20);

        return view(
            'Product.index',
            ['products'=>$products]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // typesテーブルから、ID/nameを取得
        $types = DB::table('types')->select('id', 'name')->get();
        return view(
            'Product.create',
            ['types'=>$types]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // request 値取得
        $product = new  Product();
        $product->name = $request->input('name');
        $product->type_id = $request->input('type_id');
        $product->price = $request->input('price');

        // DB save
        $product->save();

        // PRG
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // DBからレコード取得（LEFT JOIN)
        $product = DB::table('products')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->select('products.id', 'products.name', 'types.name as type_name', 'products.price')
            ->where('products.id', $id)
            ->first();

        return view(
            'Product.show',
            ['product'=>$product]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // typesテーブルから、ID/nameを取得
        $types = DB::table('types')->select('id', 'name')->get();
        
        // DBからRecord取得
        $product = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.id')
        ->select('products.id', 'products.name', 'products.type_id' ,'types.name as type_name', 'products.price')
        ->where('products.id', $id)
        ->first();
        
        return view(
            'Product.edit',
            [
                'product'=>$product,
                'types'=>$types    
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $request->validate([],['name.required' => '名前入れろや！']);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->type_id = $request->input('type_id');
        $product->price = $request->input('price');

        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //レコード削除
        $product = Product::find($id);
        $product->delete();

        // PRG
        return redirect('/product');
    }
}
