@extends('welcome')
@section('main_content')
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    @foreach($post as $row)
    <div class="post-preview">
      <a href="post.html">
        <h2 class="post-title">
        {{$row->title}}
        </h2>
        <img src="{{URL::to($row->image)}}" style="height:300px;">
        <h3 class="post-subtitle">
          Problems look mighty small from 150 miles up
        </h3>
      </a>
      <p class="post-meta">Posted by
        <a href="#">{{($row->name)}}</a>
        Slug on {{$row->slug}}
    </div>
    <hr>
    @endforeach

    <!-- Pager -->
    <div class="clearfix">
          {{$post->links()}}
    </div>
  </div>
</div>
@endsection()
