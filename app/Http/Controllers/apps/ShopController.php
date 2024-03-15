<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        return view('apps.shop.index');
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
