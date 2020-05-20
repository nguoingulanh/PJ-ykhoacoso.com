<?php

use App\Models\Setting;
use App\Models\Social;

if (!function_exists('NotificationResult')) {
    function NotificationResult($data)
    {
        switch ($data->code) {
            case '200' :
                toast($data->message, 'success', 'top-right');
                break;
            case '404':
                toast($data->message, 'warning', 'top-right');
                break;
            case '403':
                toast($data->message, 'warning', 'top-right');
                break;
            case '400':
                toast($data->message,'warning','top-right');
                break;
            case '500':
                toast($data->message,'error','top-right');
                break;
        }
    }
}

if (!function_exists('List_Category')) {
    function List_Category($data)
    {
        $dataSelect = array();
        foreach ($data as $value) {
            array_push($dataSelect, $value->title);
        }
        return $dataSelect;
    }
}

if (!function_exists('UploadImageFeature')) {
    function UploadImageFeature($data,$folder,$name)
    {
        $data->storeAs($folder,$name);
        return true;
    }
}

if (!function_exists('GetSocial')) {
    function GetSocial($data)
    {
        $res = Social::where('key','=',$data)->first()->value ?? false;

        return $res;
    }
}

if (!function_exists('GetSetting')) {
    function GetSetting($data)
    {
        $res = Setting::where('key','=',$data)->first()->value ?? false;

        return $res;
    }
}

if (!function_exists('admin_url')) {
    function admin_url($url)
    {
        if ($url !== '/')
            return url('admin') . '/' . $url;
        return url('admin');
    }
}