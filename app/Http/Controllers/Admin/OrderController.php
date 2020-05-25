<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\Ward;
use App\Service\OrderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    protected $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
        ], compact('data', 'city', 'district', 'ward'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $res = $this->service->update($request->all(), $id);

        NotificationResult($res);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getStatistical(Request $request)
    {
        if ($request->StartDate && !$request->EndDate){
            $StartDateS = date("Y-m-d 00:00:00", strtotime($request->StartDate));
            $totalorder = count(Order::where('created_at','>',$StartDateS)->get());
            $totalPending = count(Order::where('created_at','>',$StartDateS)->where('status','2')->get());
            $totalCancel = count(Order::where('created_at','>',$StartDateS)->where('status','1')->get());
            $totalComplete = count(Order::where('created_at','>',$StartDateS)->where('status','3')->get());
            $totalMoney = Order::where('created_at','>',$StartDateS)->where('status','3')->sum('total');
        }else if (!$request->StartDate && $request->EndDate){
            $StartDateE = date("Y-m-d 23:59:59", strtotime($request->EndDate));
            $totalorder = count(Order::where('created_at','<',$StartDateE)->get());
            $totalPending = count(Order::where('created_at','<',$StartDateE)->where('status','2')->get());
            $totalCancel = count(Order::where('created_at','<',$StartDateE)->where('status','1')->get());
            $totalComplete = count(Order::where('created_at','<',$StartDateE)->where('status','3')->get());
            $totalMoney = Order::where('created_at','<',$StartDateE)->where('status','3')->sum('total');
        }else if ($request->StartDate && $request->EndDate){
            $StartDateS = date("Y-m-d 00:00:00", strtotime($request->StartDate));
            $StartDateE = date("Y-m-d 23:59:59", strtotime($request->EndDate));
            $totalorder = count(Order::whereBetween('created_at', [$StartDateS, $StartDateE])->get());
            $totalPending = count(Order::whereBetween('created_at', [$StartDateS, $StartDateE])->where('status','2')->get());
            $totalCancel = count(Order::whereBetween('created_at', [$StartDateS, $StartDateE])->where('status','1')->get());
            $totalComplete = count(Order::whereBetween('created_at', [$StartDateS, $StartDateE])->where('status','3')->get());
            $totalMoney = Order::whereBetween('created_at', [$StartDateS, $StartDateE])->where('status','3')->sum('total');
        }else{
            $totalorder = count(Order::all());
            $totalPending = count(Order::where('status','2')->get());
            $totalCancel = count(Order::where('status','1')->get());
            $totalComplete = count(Order::where('status','3')->get());
            $totalMoney = Order::where('status','3')->sum('total');
        }

        return view('admin.page.statistical.index', [
            'titlePageDashboard' => 'Statistical'
        ],compact('totalorder','totalPending','totalCancel','totalComplete','totalMoney'));
    }
}
