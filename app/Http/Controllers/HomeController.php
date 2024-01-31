<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
//    show general posts of all users
    public function __invoke(){

        $ideasWithComments=Idea::with('comments','comments.user')->orderBy('updated_at','desc');
        
        if(request()->has('search')){
            $ideasWithComments= $ideasWithComments->where('content','like','%'.request('search','').'%');
            // if(isEmpty($ideasWithComments)){
            //     return redirect(route('home'))->with('waring', 'Idea not found');
            // }
        }
        $ideasWithComments=$ideasWithComments->paginate(5);
        
        return view('home',compact('ideasWithComments'));
    }
}
