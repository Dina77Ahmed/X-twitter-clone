<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaFormRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SEE YOU OWN POSTS ALL 


        // $ideas=Idea::orderBy('created_at','desc')->get();
        // return view('home',compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaFormRequest $request)
    {
        // dd($request->except(['_token']));
        $validatedData = $request->validated();
        $validatedData['user_id']=auth()->id();
        Idea::create($validatedData);

        return redirect(route('home'))->with('success', 'Idea created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $idea=Idea::findOrFail($id);
    //     return view('idea',compact('idea'));
    // }
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
            'updated_at' => now(),
            'likes' => 0,
        ]);
        return redirect(route('home'))->with('success', 'Idea edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     Idea::destroy($id);
    //     return redirect(route('home'))->with('success','an idea has been deleted successfully!');
    // }
    // Model binding 
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect(route('home'))->with('success', 'an idea has been deleted successfully!');
    }
}
