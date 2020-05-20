<?php

namespace App\Service;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductService
{
    function storeProduct($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $product = new Product;
            if (isset($data['img'])) {
                $filename = $data['img']->getClientOriginalName();
                $data['img'] = $filename;
            }
            isset($data['tag']) ? $data['tag'] = json_encode($data['tag']) : null;
            $data['status'] = isset($data['status']) ? $data['status'] : false;
            $data['slug'] = Str::slug($data['name'], "-");
            $post = Product::create($data);
        } catch (\Exception $exception) {
            dd($exception);
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function updateStatusPost($id)
    {
        $data = Product::findOrFail($id);

        if ($data['status'] == 1)
            $data['status'] = 0;
        else
            $data['status'] = 1;
        $data->save();
        return true;
    }

    function destroyProduct($id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            Product::destroy($id);
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function updateProduct($data, $id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $product = Product::findOrFail($id);
            if (isset($data['img'])) {
                $filename = $data['img']->getClientOriginalName();
                $data['img'] = $filename;
            }
            isset($data['tag']) ? $data['tag'] = json_encode($data['tag']) : null;
            $data['slug'] = Str::slug($data['name'], "-");
            $data['status'] = isset($data['status']) ? $data['status'] : false;
            $product->update($data);
        } catch (\Exception $exception) {
            dd($exception);
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function showProduct($id)
    {
        return Product::findOrFail($id);
    }
}
