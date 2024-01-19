<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Idea $idea)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Idea $idea)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request, Idea $idea)
    {
        $validatedData= $request->validated();
        $comment=$idea->comments()->create($validatedData);
        return redirect()->route('ideas.show',$idea)->with('success','Comment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea, Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea, Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea, Comment $comment)
    {
        //
    }
}
