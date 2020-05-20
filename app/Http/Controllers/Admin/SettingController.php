<?php

namespace App\Http\Controllers\Admin;

use App\Service\SettingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //
    protected $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function getGeneral()
    {
        $data = $this->service->getSettingGeneral();

        return view('admin.page.setting.general', [
            'titlePageDashboard' => 'General Settings',
        ], compact('data'));
    }

    public function getCustomFields()
    {
        $data = $this->service->getCustomFields();
        return view('admin.page.setting.custom-fields', [
            'titlePageDashboard' => 'Custom Fields',
        ], compact('data'));
    }

    public function postCustomFields(Request $request)
    {
        $res = $this->service->storeCustomFields($request->all());
        NotificationResult($res);

        return redirect()->back();
    }

    public function getPermalink()
    {
        $data = $this->service->getPermalink();

        return view('admin.page.setting.permalink', [
            'titlePageDashboard' => 'Permalink Settings',
        ], compact('data'));
    }

    public function getSiteIdentify()
    {
        return view('admin.page.setting.identify', [
            'titlePageDashboard' => 'Site Identify Settings'
        ]);
    }

    public function store(Request $request)
    {
        $res = $this->service->saveSettings($request->all());

        NotificationResult($res);
        return redirect()->back();
    }

    public function custom()
    {
        return view('admin.page.custom.index', [
            'titlePageDashboard' => 'Global Script'
        ]);
    }
}
