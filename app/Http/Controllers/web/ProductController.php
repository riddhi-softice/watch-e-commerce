<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    public function home_page()
    { 
        $data['products'] = DB::table('products')->get();
        $data['brands'] = DB::table('brands')->get();

        return view('web.index', compact('data'));
    }
   
    public function details_page()
    { 
        $productId = 1;

        $product = Product::with([
            'variants.attributeValues.attribute', // Load attributes for each variant
            'categories' // Load categories
        ])->findOrFail($productId);

        // dd($product);

        return view('web.product_detail', compact('product'));
    }


}
