<?php

namespace App\Service;

use App\Models\Category;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class CategoryService
{

    function showCategory($id)
    {
        $data = Category::find($id);
        return $data;
    }

    function storeCategory($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $category = new Category;
            $data['slug'] = Str::slug($data['title']);
            $data['type_page'] = "blog";

            $category->create($data);
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function destroyCategory($id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $data = Category::findOrFail($id);
            $data->Posts()->detach();
            Category::destroy($id);
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function updateCategory($data, $id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];

        try {
            $category = Category::findOrFail($id);

            $data['slug'] = Str::slug($data['title']);

            $category->update($data);

        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }
}
