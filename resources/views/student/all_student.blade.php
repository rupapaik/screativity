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
      <a href="{{URL::to('student/create')}}" class="btn btn-primary">Add Student</a>
          <br>  <br>
   <table class="table table-responsive">
   <tr>
     <th>SL</th>
     <th>Student Name</th>
     <th>Student Email</th>
     <th>Student Phone</th>
     <th>Action</th>
    </tr>
  @foreach($student as $row)
  <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->name}}</td>
    <td>{{$row->email}}</td>
    <td>{{$row->phone}}</td>
    <td>
      <a href="{{URL::to('/student/'.$row->id.'/edit')}}"class="btn btn-sm btn-info">Edit</a>
      <form action="{{url('student/'.$row->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      <a href="{{URL::to('/student/'.$row->id)}}"class="btn btn-sm btn-success">View</a>
    </td>
  </tr>
  @endforeach
</table>
      </div>
    </div>
</div>
@endsection
