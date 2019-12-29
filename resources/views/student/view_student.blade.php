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
          <a href="{{route('add.category')}}" class="btn btn-danger">Add Student</a>
          <a href="{{url('student')}}" class="btn btn-info">All Student</a>
<div>
  <ol>
    <li> Student Name: {{$student->name}}</li>
    <li>Student Email:{{$student->email}} </li>
    <li>Student Phone:{{$student->phone}} </li>
  </ol>
</div>
      </div>
    </div>
</div>
@endsection
