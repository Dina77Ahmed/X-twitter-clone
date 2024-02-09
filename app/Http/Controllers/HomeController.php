<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
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
        
                // Assuming you have a User model with a follows relationship

        // Get the currently authenticated user
        $user = auth()->user();
        if($user)
        // Retrieve the first two users except those that the authenticated user follows
        {$usersToFollow = User::whereNotIn('id', $user->following->pluck('id'))->where('id', '!=', $user->id)->take(2)->get();

           

            return view('home',compact('ideasWithComments','usersToFollow'));
            // Now $users contains the first two users that the authenticated user does not follow
        }
        
            return view('home',compact('ideasWithComments'));
        





        
    }
}
