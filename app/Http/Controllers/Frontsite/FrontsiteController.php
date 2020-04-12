<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;

class FrontsiteController extends Controller
{
    //
    public function index() {
        $categories = Category::with('posts')->where('status', 1)->orderBy('id', 'asc')->get();

        $posts = Post::where('status', 'published')->simplePaginate(3);

        $sliders = Slider::where('status', 1)->orderBy('id', 'asc')->get();
//        return $sliders;

//        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();

//        return $archives;


        return view('frontsite.home', compact('categories', 'posts', 'sliders', 'archives'));
    }

    public function showSinglePost($id) {
        $categories = Category::with('posts')->orderBy('id', 'asc')->get();

        $posts = Post::with('category', 'user')->orderBy('id', 'desc')->simplePaginate(2);

        $single_post = Post::with('category','user')->find(base64_decode($id));
//        dd($single_posts);

        return view('frontsite.single-post', compact( 'categories', 'posts', 'single_post'));
    }

    public function categoryWisePost($slug) {

        $cat_id = Category::with('posts')->where('slug', $slug)->select('id')->first();
//        return $cat_id;

        $categories = Category::with('posts')->where('status', 1)->orderBy('id', 'asc')->get();

        $cat_wise_posts = Category::with('posts')->select('id', 'name', 'slug', 'status', 'created_at')->orderBy('id', 'desc')->find($cat_id->id);
//        return $catWisePosts;

        $sliders = Slider::where('status', 1)->orderBy('id', 'asc')->get();

//        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();

        return view('frontsite.category', compact('categories','cat_wise_posts', 'sliders', 'date_wise_posts', 'archives'));


    }

//    public function showPostsArchives(Request $request) {
//        $post = Post::latest();
//
//        $categories = Category::where('status', 1)->orderBy('id', 'asc')->get();
//
//        $sliders = Slider::where('status', 1)->orderBy('id', 'asc')->get();
//
//        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
//
//        if($month = request('month')){
//            $post->whereMonth('created_at', Carbon::parse($month)->month);
//        }
//
//        if($year = request('year')){
//            $post->whereMonth('created_at', $year);
//        }
//
//        $posts = $post->simplePaginate(2);
//
////        dd($posts);
//
//        return view('frontsite.post-archives', compact('categories',  'sliders', 'archives', 'posts'));
//
//    }


    public function showPostArchives($date) {
//        return $date;
        $categories = Category::with('posts')->where('status', 1)->orderBy('id', 'asc')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'asc')->get();

        $posts = Post::with('category', 'user')->orderBy('id', 'desc')->simplePaginate(3);

        $post_archives = Post::with('category', 'user')->where('created_at', 'LIKE', '%' . $date . '%')->where('status', 'published')->paginate(2);

//        return $post_archives;

        return view('frontsite.post-archives', compact('categories',  'sliders', 'posts', 'post_archives'));
    }





}
