@section('title')
Edit | Comment
@endsection
@extends('layout.app')
@section('content')
<div class="col-6">
    <h4> edit your comment </h4>
    <div class="row">
        <form action="{{ route('ideas.comments.update',['idea' => $idea->id, 'comment' => $comment->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">   
        <textarea class="form-control" id="comment" name="my_comment" rows="3">
          {{ trim($comment->my_comment)}} 
        </textarea>
        @error('my_comment')
        <span class="fs-6 text-danger">
            {{ $message }}
        </span>
        @enderror
        </div>
        <button class="btn btn-primary  btn-sm" type="submit"> update </button>
        </form>
      
</div>
</div>
@endsection