@extends('layouts.app')

@section('update-blog-content-page')
<div class="container">
    <div class="row">
     
    
        <form action="{{route('blog.data',$edit->id)}}" method="POST" class="w-25 m-auto">

           @csrf
           @method('PUT')
        
            <div class="mb-3 mt-3">
                <h3 class="text-center p-1 rounded bg text-white bg-primary ">Add Post Here</h3>
              <label for="title-input" class="form-label">Title:</label>
              <input type="text" class="form-control" id="title-input" placeholder="Enter Post Title" name="title" value="@error('title')
                {{old('title')}} @else {{$edit->title}} @enderror">
              @error('title')
                 <p class="text text-danger  fw-bold">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="text" class="form-label">Feedback:</label>
             <textarea name="details" id="text" cols="30" placeholder="What's on your message ?" rows="4">{{$edit->detail}}</textarea>
            </div>
            <img src="{{url('/public/assets/images/'. $edit->feature)}}" alt="">
            <input type="file" name="image" value="{{old('feature')}}">
            @error('details')
            <p class="fw-bold text-danger">{{$message}}</p>
            @enderror
              
           
            <button  class="btn btn-primary">Submit</button>
          </form>
    </div>
   </div>

@endsection