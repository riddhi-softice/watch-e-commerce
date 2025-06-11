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
        $data['all_products'] = Product::with('images')->latest()->take(12)->get();
        return view('web.index', compact('data'));
    }
  
    public function more_product()
    {
        $data['all_products'] = Product::with('images')->latest()->paginate(8); 
        return view('web.more_product', compact('data'));
    }
  
    public function details_page($id)
    { 
        $product = Product::with(['images'])->findOrFail($id);
        return view('web.product_detail', compact('product'));
    }

}
