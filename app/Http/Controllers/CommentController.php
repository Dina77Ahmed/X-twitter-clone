<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Idea $idea)
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create(Idea $idea)
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request, Idea $idea)
    {
        $validatedData= $request->validated();
        $validatedData['user_id']=auth()->id();
        $validatedData['idea_id']=$idea->id;
        $idea->comments()->create($validatedData);
        // this is the same as 

        // Comment::create([
            //     $validatedData['user_id'],
            //     $validatedData['idea_id'],
            //     $validatedData,
        // ]);

        return redirect()->route('ideas.show',$idea)->with('success','Great! You Add New Comment');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Idea $idea, Comment $comment)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea, Comment $comment)
    {
        return view('comment.edit',compact('comment','idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentFormRequest $request, Idea $idea, Comment $comment)
    {
        $validatedData = $request->validated();

        if($validatedData['my_comment']==$comment->my_comment){
            
            return redirect(route('home'))->with('waring', 'comment not changed');
        }

    $comment->update([
        'my_comment' => $validatedData['my_comment'],
        'updated_at' => now(),
        'likes' => 0,
    ]);
    return redirect(route('home'))->with('success', 'comment edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea, Comment $comment)
    {   
        $comment->delete();

        return redirect()->route('ideas.show',$idea)->with('success','Comment deleted successfully');
    }
}
