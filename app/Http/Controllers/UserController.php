<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function  index()
    {
        
        $userIdeas=Idea::with('comments')->
        orderBy('created_at','desc')->
        where('user_id','=',auth()->user()->id)
        ->get();

        return view('user.profile',compact('userIdeas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {   


        // $userIdeas=Idea::with('comments')->
        // orderBy('created_at','desc')->
        // where('user_id','=',$user->id)
        // ->get();
        $userIdeas=$user->ideas()->with('comments')->orderBy('created_at','desc')
        ->paginate(3);

        return view('user.profile',compact('user','userIdeas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, User $user)
    {  
        $validatedData=$request->validated();

        // Check if there is a new image uploaded
        if ($request->hasFile('image'))
        { 
            $image = $request->file('image')->store( options: 'profile');
            $validatedData['image'] =$image;
            //delete old image
            Storage::disk('profile')->delete($user->image);
        }
        
        $user->update($validatedData);
        
        return redirect(route('home'))->with('success', 'your data updated  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function follow(User $user){
        $follower=auth()->user();
        $follower->following()->attach($user);
        
        return redirect(route('users.show',$user))->with('success','Great! You Follow '.$user->name.' Now');
    }

    public function unfollow(User $user){
        $follower=auth()->user();
        $follower->following()->detach($user);
        
        return redirect(route('users.show',$user))->with('success','you unfollow '.$user->name.' successfully');
    }

    public function feed(){

        $followersID=auth()->user()->following()->pluck('following_id');
       
        $ideasWithComments=Idea::whereIn('user_id',$followersID)->latest();
        // dd($followersID);  
              $ideasWithComments=$ideasWithComments->paginate(3);
        
        return view('user.feed',compact('ideasWithComments'));
    }

}
