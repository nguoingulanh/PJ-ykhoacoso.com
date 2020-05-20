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
            'titleSite' => 'Sản phẩm của y học cơ sở'
        ], compact('product'));
    }
}
