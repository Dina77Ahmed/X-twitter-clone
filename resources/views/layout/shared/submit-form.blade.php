<div class="row">
    <form 
        action={{ route('ideas.store') }}
        method="POST"
        >
        @csrf
    <div class="mb-3">   
         <textarea class="form-control" id="idea" name="content" rows="3"></textarea>
         @error('content')
         <span class="fs-6 text-danger">
             {{ $message }}
         </span>
         @enderror
        </div>
    <div class="">
        <button class="btn btn-dark" type="submit"> Share </button>
    </div>
</form>
</div>