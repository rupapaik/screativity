@extends('welcome')
@section('main_content')
@if(session()->has('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div>
@endif

<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">          
<div>
  <h3> {{$post->title}}</h3>
    <img src="{{URL::to($post->image)}}"height="450px;">
    <p> Category Name: {{$post->name}}</p>
    <p>{{$post->details}}</p>
</div>
      </div>
    </div>
</div>
@endsection
