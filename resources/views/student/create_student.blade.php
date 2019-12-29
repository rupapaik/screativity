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
          <a href="{{URL::to('student')}}" class="btn btn-info">All Student</a>
          <hr><br>
          <h3>Add New Student</h3>
    <form action="{{url('student')}}" method="post">
      @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Name</label>
            <input type="text" class="form-control" placeholder="Student Name" name="name" required >

          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Email</label>
              <input type="email" class="form-control" placeholder="Student Email" name="email" required >

          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Phone</label>
              <input type="number" class="form-control" placeholder="Student Phone" name="phone" required >
          </div>
        </div>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>
@endsection
