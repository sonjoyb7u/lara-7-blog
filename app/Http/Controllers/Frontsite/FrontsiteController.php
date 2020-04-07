<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Category;

class FrontsiteController extends Controller
{
    //
    public function index() {
        $categories = Category::orderBy('id', 'asc')->get();
        $posts = Post::with('category')->orderBy('id', 'desc')->simplePaginate(4);
        return view('frontsite.home', compact('posts', 'categories'));
    }

    public function showSinglePost($id) {
        $categories = Category::orderBy('id', 'asc')->get();
        $single_post = Post::with('user')->find(base64_decode($id));
//        dd($single_posts);

        return view('frontsite.single-post', compact( 'single_post', 'categories'));
    }





}
