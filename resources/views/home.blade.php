@extends('layout.app')
@section('content')
<div class="col-6">
   
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
</div>
@endsection 