@extends('layout.app')
@section('content')
<div class="col-6">
   
   
    @if($ideas->isEmpty())
    <h1 class="text-center">No Results</h1>
    @else
    @include('layout.shared.success-message')
    <h4> Share yours ideas </h4>
    @include('layout.shared.submit-form')
    <hr>
    @foreach($ideas as $idea)
    @include('layout.shared.idea-card')
    @endforeach

   
    
    
    <div class=" mt-3 " >
        {{ $ideas->links() }}
    </div>
    @endif
</div>
@endsection 