<?php

namespace App\Service;


use App\Models\Category;
use App\Models\Posts;
use Illuminate\Support\Str;

class PostService
{
    function getPost()
    {
        $data = Posts::paginate(15);

        return $data;
    }

    function storePost($data)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $post = new Posts;
            if (isset($data['photo'])) {
                $filename = $data['photo']->getClientOriginalName();
                $data['photo'] = $filename;
            }
            isset($data['post_tag']) ? $data['post_tag'] = json_encode($data['post_tag']) : null;
            $data['is_published'] = isset($data['is_published']) ? $data['is_published'] : false;
            $data['slug'] = Str::slug($data['title'], "-");
            $post = Posts::create($data);
            $tag = Category::find($data['category']);
            $post->Category()->attach($tag);
        } catch (\Exception $exception) {
            dd($exception);
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }

    function showPost($id)
    {
        $data = Posts::find($id);
        return $data;
    }

    function updatePost($data, $id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $post = Posts::findOrFail($id);
            if (isset($data['photo'])) {
                $filename = $data['photo']->getClientOriginalName();
                $data['photo'] = $filename;
            }
            isset($data['post_tag']) ? $data['post_tag'] = json_encode($data['post_tag']) : null;
            $data['slug'] = Str::slug($data['title'], "-");
            $data['is_published'] = isset($data['is_published']) ? $data['is_published'] : false;
            $post->update($data);
            $tag = Category::find($data['category']);
            $post->Category()->sync($tag);
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
        $data = Posts::findOrFail($id);

        if ($data['is_published'] == 1)
            $data['is_published'] = 0;
        else
            $data['is_published'] = 1;
        $data->save();
        return true;
    }


    function destroyPost($id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $post = Posts::find($id);
            $post->Category()->detach();
            Posts::destroy($id);
        } catch (\Exception $exception) {
            $res = (object)[
                'code' => 500,
                'message' => 'System Error!'
            ];
        }
        return $res;
    }
}
