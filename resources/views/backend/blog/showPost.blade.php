
@extends('layouts.app')

@section('show-post-content')

<div class="container">
    <div class="row">
       
       
    <div class="card-body">
        <div class="card-header">
            <h2>{{$showBlog->title}}</h2>
        </div>

        <img src="{{asset('/assets/images/' . $showBlog->feature)}}"  alt="" width="300px" height="300px">
        <div class="card text-center">
    

      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text"><>{{$showBlog->detail}}</p>
      <a href="{{route('allblogs')}}" class="btn btn-primary">Go Back</a>
    </div>
    <div class="card-footer text-muted">
        @php
        $convertDate = strtotime($showBlog->created_at);
            $date = date('d/M/Y H:i:s',$convertDate);
        @endphp
     <span>{{$date}}</span>
    </div>
  </div>


<br>
    </div>
</div>


<h4>Author {{$showBlog->added_by}}</h4>
@endsection