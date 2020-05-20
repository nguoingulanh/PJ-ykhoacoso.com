<?php

namespace App\Http\Controllers\Admin;

use App\Models\RequestLogs;
use App\Service\RequestLogsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestLogController extends Controller
{
    protected $service;

    public function __construct(RequestLogsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data = RequestLogs::orderBy('id', 'DESC')->paginate(15);

        return view('admin.page.requestlogs.index', [
            'titlePageDashboard' => 'Requests Logs'
        ], compact('data'));
    }

    public function destroy($id)
    {
        $res = $this->service->destroyReuest($id);
        NotificationResult($res);
    }

    public function destroyAll()
    {
        $res = $this->service->destroyAll();
        NotificationResult($res);
        return redirect()->back();
    }
}
