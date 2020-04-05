<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontsiteController extends Controller
{
    //
    public function index() {
//        $categories = ['Home', 'Food', 'Bd News', 'World News', 'Tour & Travels', 'Sports News', 'Political News'];
        return view('frontsite.home');
    }

    public function showSinglePost() {
//        $categories = ['Home', 'Food', 'Bd News', 'World News', 'Tour & Travels', 'Sports News', 'Political News'];
        $single_post = [
            'title' => 'Sample blog post-1',
            'short_desc' => '<p>
                            This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, images, and code are all supported.
                       </p>
                       <hr>
                       <p>
                            Curabitur blandit tempus porttitor. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.
                        </p>
                        <h2>Heading-1</h2>
                        <p>
                            Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                        </p>',
            'author' => 'Sonjoy Barua',
            'created_at' => 'January 1, 2014',

        ];
        return view('frontsite.single-post', compact( 'single_post'));
    }





}
