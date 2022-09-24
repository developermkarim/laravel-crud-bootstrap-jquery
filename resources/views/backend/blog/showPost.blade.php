
@extends('layouts.app')

@section('show-post-content')
<h2>{{$showBlog->title}}</h2>
<br>
<p>{{$showBlog->detail}}</p>
<h4>Author {{$showBlog->added_by}}</h4>
@endsection