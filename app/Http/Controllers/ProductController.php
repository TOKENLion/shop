<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductLog;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validation = Validator::make($request->all(), [
            'price' => 'numeric',
            'price_offer' => 'numeric',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors());
        }

        $productOld = clone $product;
        $product->update($request->all());
        $changes = array_filter($product->getChanges(), function ($record, $key) {
            return $key !== "updated_at";
        }, ARRAY_FILTER_USE_BOTH);

        $data = [];
        $currentDate = date('Y-m-d H:i:s');
        $userIP = $request->getClientIp();
        foreach ($changes as $field => $change) {
            $data[] = [
                'user_id' => 1,
                'product_id' => $product->id,
                'user_ip' => $userIP,
                'field' => $field,
                'old_value' => $productOld->{$field},
                'new_value' => $change,
                'created_at' => $currentDate,
                'updated_at' => $currentDate,
            ];
        }

        ProductLog::insert($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function allProducts(ProductService $product)
    {
        return response()->json($product->getAllProducts()->toArray());
    }

    public function getSingle(Request $request, ProductService $product)
    {
        return response()->json($product->getOnceProduct($request->id)->toArray());
    }
}
