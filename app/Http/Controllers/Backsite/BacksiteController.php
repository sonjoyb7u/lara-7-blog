<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BacksiteController extends Controller
{
    //
    public function index() {
        return view('backsite.admin.home');
    }


}
