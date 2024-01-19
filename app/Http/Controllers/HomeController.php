<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    show general posts of all users
    public function __invoke(){
        $ideasWithComments=Idea::with('comments')->orderBy('updated_at','desc');
        
        if(request()->has('search')){
            $ideasWithComments= $ideasWithComments->where('content','like','%'.request('search').'%');
        }
        $ideasWithComments=$ideasWithComments->paginate(3);
        
        return view('home',compact('ideasWithComments'));
    }
}
