<?php

namespace App\Http\Controllers\Website;

use App\Models\Category;
use App\Models\Posts;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    //

    public function home()
    {

        $slider = Slider::where('is_publish', '1')->get();
        $products = Product::where('status', '1')->limit(12)->get();

        return view('website.page.home.index', compact(
            'slider', 'products'
        ));
    }

    public function shop()
    {
        $product = Product::where('status', '1')->orderBy('id', 'DESC')->paginate(12);
        return view('website.page.shop.index', [
            'titleSite' => 'Sản phẩm y học cơ sở',
            'titleSitePage' => 'Sản phẩm y học cơ sở',
        ], compact('product'));
    }

    public function detailproduct($slug)
    {
        $data = Product::where('slug', $slug)->first();
        if (!$data)
            abort(404);
        if ($data && $data['status'] === 0)
            abort(404);

        $productFea = Product::where('slug', '!=', $slug)->where('status', '1')->inRandomOrder()->limit(4)->get();
        return view('website.page.shop.detail-product',
            [
                'titleSite' => $data->name,
                'titleSitePage' => 'Chi tiết sản phẩm',
                'is_publish' => $data->created_at,
                'titleSiteSEO' => $data->name,
                'descriptionSiteSEO' => $data->content,
                'imageSiteSEO' => asset('storage/product/feature/' . $data->img)
            ],
            compact('data', 'productFea'));
    }

    public function blog()
    {
        $posts = Posts::where('is_published', '1')->orderBy('id', 'DESC')->paginate(12);
        return view('website.page.blog.index', [
            'titleSite' => 'Tin tức',
            'titleSitePage' => 'Tin tức',
        ], compact('posts'));
    }

    public function detailblog($slug)
    {
        $data = Posts::where('slug', $slug)->first();
        if (!$data)
            abort(404);
        if ($data && $data['is_published'] === 0)
            abort(404);
        return view('website.page.blog.detail-blog',
            [
                'titleSite' => $data->title,
                'titleSitePage' => 'Chi tiết bài viết',
                'is_publish' => $data->created_at,
                'titleSiteSEO' => $data->title_seo,
                'descriptionSiteSEO' => $data->description_seo,
                'imageSiteSEO' => asset('storage/product/feature/' . $data->photo)
            ],
            compact('data'));
    }

    public function addtocart($slug)
    {
        $data = Product::where('slug', $slug)->first();
        if (!$data)
            return response("Sản phẩm không tồn tại!", 404);
        if ($data && $data['status'] === 0)
            return response("Sản phẩm không tồn tại!", 404);
        $dataRequest = \request()->all();

        $cart = session()->has('cart') ? session()->get('cart') : [];
        if (array_key_exists($data->id, $cart)) {
            isset($dataRequest['quantity']) ? $cart[$data->id]['quantity'] = $cart[$data->id]['quantity'] + $dataRequest['quantity'] : $cart[$data->id]['quantity']++;
        } else {
            isset($dataRequest['quantity']) ? $quantity = $dataRequest['quantity'] : $quantity = 1;
            $cart[$data->id] = [
                'title' => $data->name,
                'quantity' => $quantity,
                'unit_price' => $data->price,
            ];
        }
        session()->put('cart', $cart);

        return response(["Đã thêm " . $data->name . " vào giỏ hàng",count(Session::get('cart'))], 200);
    }

    public function getCategory()
    {
        return Category::all();
    }

    public function getBlog()
    {
        return Posts::where('is_published', '1')->inRandomOrder()->limit(4)->get();
    }

    public function getCountCart()
    {
        return Session::get('cart') ? count(Session::get('cart')) : 0;
    }
}
