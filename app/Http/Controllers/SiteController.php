<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function home() {
        $id = 1234567890;
        $name = "Sonjoy Barua";
        $data = [
            [   "Id"=>"12310068",
                "Name"=>"Sonjoy Barua",
                "Dept"=>"CSE",
                "Gender"=>"male",
                "Age"=>"32",
            ],
            [   "Id"=>"12310067",
                "Name"=>"Payel Barua",
                "Dept"=>"ECE",
                "Gender"=>"Female",
                "Age"=>"12",
            ],
            [   "Id"=>"12310066",
                "Name"=>"Peow Barua",
                "Dept"=>"EEE",
                "Gender"=>"Female",
                "Age"=>"10",
            ]
        ];
        // return view('home', compact('id', 'name', 'data'));
//        return view('home')->with('id', $id)->with('name', $name)->with('data', $data);
        return view('home')->with([
            'id'=>$id,
            'name'=>$name,
            'datas'=>$data,
        ]);
    }

    public function about() {
        return view('about');
    }
}
