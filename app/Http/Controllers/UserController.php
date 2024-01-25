<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

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

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {   
        $editing=true;

        // $userIdeas=Idea::with('comments')->
        // orderBy('created_at','desc')->
        // where('user_id','=',$user->id)
        // ->get();
        $userIdeas=$user->ideas()->paginate(2);

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

        if ($validatedData['name']===$user->name && $validatedData['bio']===$user->bio)
        {
            return redirect(route('home'))->with('waring', 'you do not update your data');
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
}
