@extends('welcome')
@section('main_content')
@if(session()->has('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
          <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
     <form action="{{URL::to('/update/category/'.$category->id)}}" method="post">
      @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Category Name</label>
            <input type="text" class="form-control" value="{{$category->name}}" name="name" required >

          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Slug Name</label>
              <input type="text" class="form-control"  value="{{$category->slug}}" name="slug" required >

          </div>
        </div>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" >Update</button>
        </div>
      </form>
      </div>
    </div>
</div>
@endsection
