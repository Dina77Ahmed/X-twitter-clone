<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    show general posts of all users
    public function __invoke(){
        $ideas=Idea::orderBy('updated_at','desc')->paginate(3);
        return view('home',compact('ideas'));
    }
}
