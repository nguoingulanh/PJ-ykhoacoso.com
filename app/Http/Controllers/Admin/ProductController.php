<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $service;

    public function __construct(ProductService $service)
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
        $res = Product::paginate(15);
        return view('admin.page.product.index', [
            'titlePageDashboard' => 'Product'
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
        return view('admin.page.product.create', [
            'titlePageDashboard' => 'Add Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        //
        $res = $this->service->storeProduct($request->all());
        if (isset($request['img']))
            UploadImageFeature($request->file('img'), 'public/product/Feature', $request['img']->getClientOriginalName());
        NotificationResult($res);

        return redirect()->back();
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
        $data = $this->service->showProduct($id);

        return view('admin.page.product.update', [
            'titlePageDashboard' => $data->name,
        ], compact('data'));
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
        $res = $this->service->updateProduct($request->all(), $id);
        if (isset($request['img']))
            UploadImageFeature($request->file('img'), 'public/product/Feature', $request['img']->getClientOriginalName());
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
        $res = $this->service->destroyProduct($id);
        NotificationResult($res);
    }

    public function updateStatus($id)
    {
        $res = $this->service->updateStatusPost($id);
        return 200;
    }
}
