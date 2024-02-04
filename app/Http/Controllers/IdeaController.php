<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaFormRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function store(IdeaFormRequest $request)
    {
        // dd($request->except(['_token']));
        $validatedData = $request->validated();
        $validatedData['user_id']=auth()->id();
        Idea::create($validatedData);

        return redirect(route('home'))->with('success', 'Great! You Share New Idea Now');
    }

    public function show(Idea $idea)
    {
        return view('idea.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('idea.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaFormRequest $request, Idea $idea)
    {
        $validatedData = $request->validated();

            if($validatedData['content']==$idea->content){
                
                return redirect(route('home'))->with('waring', 'Idea not changed');
            }

        $idea->update([
            'content' => $validatedData['content'],
            // 'updated_at' => now(),
        ]);
        return redirect(route('home'))->with('success', 'Idea edit Successfully');
    }

    // Model binding 
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect(route('home'))->with('success', 'an idea has been deleted successfully!');
    }

    public function like(Idea $idea){

        $liker=auth()->user();
        $liker->like()->attach($idea);
        return redirect(route('home'));

    }

    public function dislike(Idea $idea){
        $liker=auth()->user();
        $liker->like()->detach($idea);
        return redirect(route('home'));
    }

    
}
