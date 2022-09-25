@extends('layouts.app');
@section('create-blog-content')
   <div class="container">
    <div class="row">
      @if (session()->has('insert-success'))
          <div class="alert alert-success">{{session('insert-success')}}</div>
      @endif
        <form action="{{route('blog.all')}}" method="POST" class="w-50 m-auto" enctype="multipart/form-data">

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
              <label for="text" class="form-label">Feedback:</label><br>
             <textarea name="details" id="text" cols="50" placeholder="What's on your message ?" rows="4">{{old('message')}}</textarea>
            </div>
            @error('details')
                <p class="fw-bold text-danger">{{$message}}</p>
            @enderror
            <div class="mb-3">
              <label for="FrameWorks">
               Used in Tech Company :
              </label><br>
              <input type="checkbox" name="framework[]" value="Facebook" id=""> Facebook &nbsp;
              <input type="checkbox" name="framework[]" value="Twitter" id=""> Twitter &nbsp;
              <input type="checkbox" name="framework[]" value="Youtube" id=""> Youtube &nbsp;
              <input type="checkbox" name="framework[]" value="Wikipedia" id=""> Wikipedia &nbsp;
              <input type="checkbox" name="framework[]" value="Microsoft" id=""> Microsoft &nbsp;
              <input type="checkbox" name="framework[]" value="Whatsapp" id=""> Whatsapp &nbsp;
              <input type="checkbox" name="framework[]" value="Google" id=""> Google &nbsp;
              <input type="checkbox" name="framework[]" value="Linkedin" id=""> Linkedin &nbsp;
              <input type="checkbox" name="framework[]" value="Messanger" id=""> Messanger &nbsp;
             @error('framework')
             <p class="fw-bold text-danger">{{$message}}</p>
             @enderror
           
            </div>

            <div class="mb-3">
             <label for="">Popularity In : </label><br>
             <input type="radio" name="development" value="Front-End Development" id=""> Front-End Development &nbsp;
             <input type="radio" name="development" value="Back-End Development" id=""> Back-End Development
             <input type="radio" name="development" value="Android-App-Development" id=""> Android-App-Development
             <input type="radio" name="development" value="Game-Development" id=""> Game-Development
             <input type="radio" name="development" value="Desktop-App-Development" id=""> Desktop-App-Development
             @error('development')
                 {{$message}}
             @enderror
            </div>
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
   @push('')
       <script src=""></script>
   @endpush
@endsection