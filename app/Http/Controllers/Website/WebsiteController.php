<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'titleSite' => 'Sản phẩm y học cơ sở'
        ], compact('product'));
    }

    public function detailproduct($slug)
    {
        $data = Product::where('slug', $slug)->first();
        if (!$data)
            abort(404);
        if ($data && $data['status'] === 0)
            abort(404);

        $productFea = Product::where('slug','!=',$slug)->where('status','1')->inRandomOrder()->limit(4)->get();
        return view('website.page.shop.detail-product',
        [
            'titleSite'             => 'Chi tiết sản phẩm',
            'is_publish'            => $data->created_at,
            'titleSiteSEO'          => $data->name,
            'descriptionSiteSEO'    => $data->content,
            'imageSiteSEO'          => asset('storage/product/feature/'.$data->img)
        ],
        compact('data','productFea'));
    }
}
