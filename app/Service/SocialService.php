<?php

namespace App\Service;


use App\Models\Social;

class SocialService
{
    function storeSocial($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            foreach ($data as $key => $value) {
                Social::updateOrCreate(['key' => $key], [
                    'value' => is_array($value) ? json_encode($value) : $value,
                ]);
            }
        } catch (\Exception $e) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }
}
