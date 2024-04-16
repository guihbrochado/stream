<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index() {

        $blogs = DB::Select("
        select *
        from blog ");

        $recentPosts = DB::Select("
        select *
        from blog
        order by created_at desc");

        $categories = DB::Select("
        select *
        from blogcategories
        where status = 1");


        return view('apps.blog.index')->with(['blogs' => $blogs, 'recentPosts' => $recentPosts, 'categories' => $categories]);
    }
    public function blogByCategory($idcategory) {

        $blogs = DB::Select("
        select *
        from blog
        where idcategory = $idcategory");

        $recentPosts = DB::Select("
        select *
        from blog
        order by created_at desc");

        $categories = DB::Select("
        select *
        from blogcategories
        where status = 1");

        return view('apps.blog.index')->with(['blogs' => $blogs, 'recentPosts' => $recentPosts, 'categories' => $categories]);
    }
}
