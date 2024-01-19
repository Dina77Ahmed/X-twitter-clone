@extends('layout.app')
@section('content')
<div class="col-6">
   
   
    @if($ideasWithComments->isEmpty())
    <h1 class="text-center">No Results</h1>
    @else
    @include('layout.shared.success-message')
    <h4> Share yours ideas </h4>
    @include('layout.shared.submit-form')
    <hr>
    @foreach($ideasWithComments as $idea)
    @include('layout.shared.idea-card')
    @endforeach
    
    <div class=" mt-3 " >
        {{ $ideasWithComments->links() }}
    </div>
    @endif
</div>
@endsection 