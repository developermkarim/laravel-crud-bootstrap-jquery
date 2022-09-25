@extends('layouts.app')

@section('update-blog-content-page')
<div class="container">
    <div class="row">
     
    
        <form action="{{route('blog.data',$edit->id)}}" method="POST" class="w-50 m-auto">

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
             <textarea name="details" id="text" cols="50" placeholder="What's on your message ?" rows="4">{{$edit->detail}}</textarea>
            </div>
            <div class="mb-3">
              <label for="">Update Your Feature</label><br>
              <img src="{{asset('/assets/images/'. $edit->feature)}}" alt="" width="60" height="60"><br>
              
              <input type="file" name="image" value="{{old('feature')}}">
              @error('details')
              <p class="fw-bold text-danger">{{$message}}</p>
              @enderror
            </div>
           
             {{--  @php
                   $jsonDecode = json_decode($edit->lang_framework);
                in_array('Facebook',$jsonDecode);
              @endphp
 --}}
            <div class="mb-3">
              <label for="FrameWorks">
               Used in Tech Company :
              </label><br>
             
              <input type="checkbox" name="framework[]" {{in_array('Facebook',$checkValue) ? 'checked':''}} value="Facebook" id=""> Facebook &nbsp;
              <input type="checkbox" name="framework[]" {{in_array('Twitter',$checkValue) ?'checked':''}} value="Twitter" id=""> Twitter &nbsp;
              <input type="checkbox" name="framework[]" {{in_array('Twitter',$checkValue) ? 'checked':''}} value="Youtube" id=""> Youtube &nbsp;
              <input type="checkbox" name="framework[]"  {{in_array('Wikipedia',$checkValue) ? 'checked':''}}  value="Wikipedia" id=""> Wikipedia &nbsp;
              <input type="checkbox" name="framework[]"  {{in_array('Microsoft',$checkValue) ? 'checked':''}}  value="Microsoft" id=""> Microsoft &nbsp;
              <input type="checkbox" name="framework[]" {{in_array('Whatsapp',$checkValue) ? 'checked':''}}  value="Whatsapp" id=""> Whatsapp &nbsp;
              <input type="checkbox" name="framework[]" {{in_array('Google',$checkValue) ? 'checked':''}}  value="Google" id=""> Google &nbsp;
              <input type="checkbox" name="framework[]" {{in_array('Linkedin',$checkValue) ? 'checked':''}} value="Linkedin" id=""> Linkedin &nbsp;
              <input type="checkbox" {{in_array('Messanger',$checkValue) ? 'checked':''}} name="framework[]" value="Messanger" id=""> Messanger &nbsp;
             @error('framework')
             <p class="fw-bold text-danger">{{$message}}</p>
             @enderror
            {{--  @if ($errors->has('hobbies'))
            <span class="text-danger">{{ $errors->first('hobbies') }}</span>
            @endif --}}
            </div>

            <div class="mb-3">
             <label for="">Popularity In : </label><br>
             <input type="radio" name="development" value="Front-End Development" {{$edit->development_sector=='Front-End Development'?'checked':''}} id=""> Front-End Development &nbsp;
             <input type="radio" {{$edit->development_sector == 'Back-End Development' ?'checked':''}} name="development" value="Back-End Development" id=""> Back-End Development
             <input type="radio" {{$edit->development_sector =='Android-App-Development'?'checked':''}} name="development" value="Android-App-Development" id=""> Android-App-Development
             <input type="radio"  {{$edit->development_sector=='Game-Development'?'checked':''}} name="development" value="Game-Development" id=""> Game-Development
            
             <input type="radio"  {{$edit->development_sector=='Desktop-App-Development'?'checked':''}} name="development" value="Desktop-App-Development" id=""> Desktop-App-Development
        
             @error('development')
                 {{$message}}
             @enderror
            </div>
           
            <button  class="btn btn-primary">Submit</button>
          </form>
    </div>
   </div>

@endsection