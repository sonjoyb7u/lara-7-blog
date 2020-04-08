<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;

class FrontsiteController extends Controller
{
    //
    public function index() {
        $categories = Category::where('status', 1)->orderBy('id', 'asc')->get();

        $posts = Post::orderBy('id', 'desc')->simplePaginate(4);

//        $date_wise_posts = Post::whereBetween('created_at', ['2020-04-02', '2021-01-01'])->select('id', 'title', 'created_at')->get();

        $date_wise_posts = Post::where("created_at",">", Carbon::now()->subMonths())->get();

//        dd($post_dates);


        return view('frontsite.home', compact('categories', 'posts', 'date_wise_posts'));
    }

    public function showSinglePost($id) {
        $categories = Category::orderBy('id', 'asc')->get();
        $single_post = Post::with('user')->find(base64_decode($id));
//        dd($single_posts);

//        $date_wise_posts = Post::whereBetween('created_at', ['2020-04-02', '2021-01-01'])->select('id', 'title', 'created_at')->get();

        $date_wise_posts = Post::where("created_at",">", Carbon::now()->subMonths())->get();

        return view('frontsite.single-post', compact( 'categories', 'single_post', 'date_wise_posts'));
    }

    public function categoryWisePost($slug) {

        $cat_id = Category::where('slug', $slug)->select('id')->first();
//        return $cat_id;

        $categories = Category::where('status', 1)->orderBy('id', 'asc')->get();

        $cat_wise_posts = Category::with('posts')->select('id', 'name', 'slug', 'status', 'created_at')->orderBy('id', 'asc')->find($cat_id->id);

//        return $catWisePosts;

//        $date_wise_posts = Post::whereBetween('created_at', ['2020-04-02', '2021-01-01'])->select('id', 'title', 'created_at')->get();

        $date_wise_posts = Post::where("created_at",">", Carbon::now()->subMonths())->get();

        return view('frontsite.category', compact('categories','cat_wise_posts', 'date_wise_posts'));


    }





}
