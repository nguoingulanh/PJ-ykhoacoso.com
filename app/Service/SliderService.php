<?php

namespace App\Service;

use App\Models\Slider;

class SliderService
{
    function storeSlider($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $slider = new Slider;
            if (isset($data['sliders_image'])) {
                $filename = $data['sliders_image']->getClientOriginalName();
                $data['sliders_image'] = $filename;
            }
            $data['is_publish'] = isset($data['is_publish']) ? '1' : '0';
            $slider->create($data);

        } catch (\Exception $exception) {
            dd($exception);
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }

        return $res;
    }

    function updateSlider($data, $id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $slider = Slider::findOrFail($id);
            if (isset($data['sliders_image'])) {
                $filename = $data['sliders_image']->getClientOriginalName();
                $data['sliders_image'] = $filename;
            }
            $data['is_publish'] = isset($data['is_publish']) ? '1' : '0';
            $slider->update($data);
        } catch (\Exception $exception) {
            dd($exception);
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function destroySlider($id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            Slider::destroy($id);
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    public function showSlider($id)
    {
        $data = Slider::findOrFail($id);

        return $data;
    }

    public function updateStatusSlider($id)
    {
        $data = Slider::findOrFail($id);

        if ($data['is_publish'] == '1')
            $data['is_publish'] = '0';
        else
            $data['is_publish'] = '1';
        $data->save();
        return true;
    }
}
