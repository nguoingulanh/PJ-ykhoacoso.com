<?php

namespace App\Service;

use App\Models\RequestLogs;

class RequestLogsService
{
    function destroyReuest($id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            RequestLogs::destroy($id);
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function destroyAll()
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            RequestLogs::truncate();
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }
}
