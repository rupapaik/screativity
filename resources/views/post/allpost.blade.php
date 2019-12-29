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
          <a href="{{route('create.post')}}" class="btn btn-info">Write Post</a>
<br>
<br>
<table class="table table-responsive">
  <tr>
  <th>SL</th>
  <th>Category </th>
  <th>Title</th>
  <th>Image</th>
  <th>Action</th>
  </tr>
  @foreach($post as $row)
  <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->name}}</td>
    <td>{{$row->title}}</td>
    <td><img src="{{URL::to($row->image)}}" style="height:40px; width:70px;>"</td>
    <td>
      <a href="{{URL::to('/edit/post/'.$row->id)}}"class="btn btn-sm btn-info">Edit</a>
      <a href="{{URL::to('/delete/post/'.$row->id)}}"class="btn btn-sm btn-danger">Delete</a>
      <a href="{{URL::to('/view/post/'.$row->id)}}"class="btn btn-sm btn-success">View</a>
    </td>
  </tr>
  @endforeach
</table>
      </div>
    </div>
</div>
@endsection
