<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    show general posts of all users
    public function __invoke(){
        $ideas=Idea::orderBy('updated_at','desc');
        
        if(request()->has('search')){
            $ideas= $ideas->where('content','like','%'.request('search').'%');
        }
        $ideas=$ideas->paginate(3);
        
        return view('home',compact('ideas'));
    }
}
