<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Order::paginate(15);
        return view('admin.page.order.index', [
            'titlePageDashboard' => 'Order'
        ], compact('res'));
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
        $data = Order::findOrFail($id);
        $city = City::findOrFail(json_decode($data['address'])[0][0])->name;
        $district = District::findOrFail(json_decode($data['address'])[0][1])->name;
        $ward = Ward::findOrFail(json_decode($data['address'])[0][2])->name;
        return view('admin.page.order.detail', [
            'titlePageDashboard' => 'Order'
        ],compact('data','city','district','ward'));
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
