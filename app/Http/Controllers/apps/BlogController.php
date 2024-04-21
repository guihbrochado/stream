<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index() {

        $blogs = DB::Select("
        select *
        from blog 
        where status = 1");

        $recentPosts = DB::Select("
        select *
        from blog
        where status = 1
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
        where idcategory = $idcategory and status = 1");

        $recentPosts = DB::Select("
        select *
        from blog
        where status = 1
        order by created_at desc");

        $categories = DB::Select("
        select *
        from blogcategories
        where status = 1");

        return view('apps.blog.index')->with(['blogs' => $blogs, 'recentPosts' => $recentPosts, 'categories' => $categories]);
    }

    function ajaxBlogComments($idblog)
    {
        $iduser = Auth::user()->id;
        
        $data = DB::select("select bc.*, u.name
        from blogcomments bc 
        inner join users u on bc.id_user = u.id          
        where bc.id_blog = $idblog;");

        return view('apps.blog.gridcomments', ['data' => $data]);
    }
    function ajaxBlogInsertComments($idblog, $comment)
    {
        $iduser = Auth::user()->id;
        
        $data = DB::select("insert into blogcomments (id_blog, id_user, comment)
        values ($idblog, $iduser, '$comment')");      
    }


}
