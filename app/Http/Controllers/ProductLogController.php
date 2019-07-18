<?php

namespace App\Http\Controllers;

use App\ProductLog;
use App\Services\ProductLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductLogController extends Controller
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
     * @param  \App\ProductLog  $productLog
     * @return \Illuminate\Http\Response
     */
    public function show(ProductLog $productLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductLog  $productLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductLog $productLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductLog  $productLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductLog $productLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductLog  $productLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductLog $productLog)
    {
        //
    }

    public function getSingle(Request $request, ProductLogService $productLog)
    {
        $validation = Validator::make($request->all(), [
            'from' => 'date_format:"d.m.Y"',
            'to' => 'date_format:"d.m.Y"',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors());
        }

        return response()->json($productLog->getByProduct($request->id, $request->from, $request->to)->toArray());
    }
}
