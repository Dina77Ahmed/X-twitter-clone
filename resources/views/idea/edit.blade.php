@extends('layout.app')
@section('content')
<div class="col-6">
    <h4> edit yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.update',$idea->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">   
        <textarea class="form-control" id="idea" name="content" rows="3">
            {{ $idea->content }}
        </textarea>
        @error('content')
        <span class="fs-6 text-danger">
            {{ $message }}
        </span>
        @enderror
        </div>
        <button class="btn btn-success btn-sm" type="submit"> update </button>
        </form>
      
</div>
</div>
@endsection