<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ViewIndex(){
        return view("frontend.index");
    }

    public function ViewLogin(){
        return view("frontend.login");
    }

    public function ViewSignup(){
        return view("frontend.signup");
    }
}
