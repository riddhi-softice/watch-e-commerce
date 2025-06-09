<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    public function home_page()
    { 
        $data['brands'] = DB::table('brands')->get(); 
        $data['categories'] = Category::with(['products.images'])->get();
        $data['all_products'] = Product::with('images')->latest()->take(12)->get();

        return view('web.index', compact('data'));
    }
    
    public function more_product()
    { 
        $data['brands'] = DB::table('brands')->get(); 
        $data['categories'] = Category::with(['products.images'])->get();
        $data['all_products'] = Product::with('images')->latest()->take(12)->get();

        return view('web.more_product', compact('data'));
    }
   
    public function details_page($id)
    { 
        $product = Product::with(['images','category', 'attributeValues.attribute','reviews.user', 'relatedProducts.firstImage', 'relatedProducts.reviews' => function ($q) {
            $q->select('id', 'product_id', 'rating');
        }])->withCount('reviews')->withAvg('reviews', 'rating')->findOrFail($id);

        $product->rating = round($product->reviews_avg_rating ?? 0, 1);

        // Optional: Add rating & reviews_count to each related product
        $relatedProducts = $product->relatedProducts->map(function ($item) {
            $item->reviews_count = $item->reviews->count();
            $item->rating = round($item->reviews->avg('rating') ?? 0, 1);
            return $item;
        });

        // dd($relatedProducts[0]->firstImage->path,$relatedProducts);


        $attributeGroups = [];
        foreach ($product->attributeValues as $attVal) {
            $attributeGroups[$attVal->attribute->name][] = $attVal->value;
        }

        return view('web.product_detail', compact('product','attributeGroups','relatedProducts'));
    }

}
