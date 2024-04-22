<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = Product::all();
        return view('apps.shop.index', compact('categories','products'));
    }
    
    public function whishlist() {
        return view('apps.shop.whishlist');
    }
    
    public function checkout() {
        return view('apps.shop.checkout');
    }
    
    public function detail() {
        return view('apps.shop.detail');
    }
}
