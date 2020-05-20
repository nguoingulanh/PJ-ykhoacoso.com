<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Slider\AddSliderRequest;
use App\Models\Slider;
use App\Service\SliderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    protected $service;

    public function __construct(SliderService $service)
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
        $data = Slider::paginate(15);

        return view('admin.page.slider.index', [
            'titlePageDashboard' => 'Slider',
        ], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.slider.create', [
            'titlePageDashboard' => 'Add Slider',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSliderRequest $request)
    {
        //
        $res = $this->service->storeSlider($request->all());
        UploadImageFeature($request->file('sliders_image'), 'public/slider', $request['sliders_image']->getClientOriginalName());
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
        $data = $this->service->showSlider($id);

        return view('admin.page.slider.update', [
            'titlePageDashboard' => $data->sliders_title,
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
        $res = $this->service->updateSlider($request->all(), $id);
        if (isset($request['sliders_image']))
            UploadImageFeature($request->file('sliders_image'), 'public/slider', $request['sliders_image']->getClientOriginalName());
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
        $res = $this->service->destroySlider($id);
        NotificationResult($res);
    }

    public function updateStatus($id)
    {
        $this->service->updateStatusSlider($id);
        return 200;
    }
}
