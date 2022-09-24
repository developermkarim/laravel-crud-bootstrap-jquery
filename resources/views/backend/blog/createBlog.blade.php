@extends('layouts.app');
@section('create-blog-content')
   <div class="container">
    <div class="row">
      @if (session()->has('insert-success'))
          <div class="alert alert-success">{{session('insert-success')}}</div>
      @endif
        <form action="{{route('blog.all')}}" method="POST" class="w-25 m-auto" enctype="multipart/form-data">

         @csrf
            <div class="mb-3 mt-3">
                <h3 class="text-center p-1 rounded bg text-white bg-primary ">Add Post Here</h3>
              <label for="title-input" class="form-label">Title:</label>
              <input type="text" class="form-control" id="title-input" placeholder="Enter Post Title" name="title" value="{{old('title')}}">
              @error('title')
                 <p class="text text-danger  fw-bold">{{$message}} </p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Feedback:</label>
             <textarea name="details" id="text" cols="30" placeholder="What's on your message ?" rows="4">{{old('message')}}</textarea>
            </div>
            @error('details')
                <p class="fw-bold text-danger">{{$message}}</p>
            @enderror
            <div class="mb-3">
              <label for="image">Upload Your File</label>
                <input type="file" name="image" value="{{old('image')}}">
              @error('featureImage')
              <p class="fw-bold text-danger">{{$message}}</p>
              @enderror
            </div>
            <button  class="btn btn-primary">Submit</button>
          </form>
    </div>
   </div>
@endsection