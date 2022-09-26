
@extends('layouts.app')

@section('show-post-content')

<div class="container">
    <div class="row w-75 m-auto">
       
        
    <div class="card-body text-center">
        <div class="card-header mb-3">
            <h2>{{$showBlog->title}}</h2>
           
            <small>{{$showBlog->development_sector}}</small>
            <h6 class="card-title py-3">Author: {{$showBlog->author}}</h6>
        </div>

        <img style="display: inline-block" src="{{asset('/assets/images/' . $showBlog->feature)}}"  alt="" width="300px" height="300px">
        <div class="card text-center">
    
            <h5>Used In 
                @php
                $jsonDecode = json_decode($showBlog->lang_framework);
                foreach ($jsonDecode  as $value) {
                  echo $value;echo ",";
                }
            @endphp
            </h5>

    

      @php
        $convertDate = strtotime($showBlog->created_at);
            $date = date('d/M/Y H:i:s',$convertDate);
        @endphp
     <p class="">{{$date}}</p>
      <p class="card-text"><>{{$showBlog->detail}}</p>
      <a href="{{route('allblogs')}}" class="btn btn-primary w-25 m-auto">Go Back</a>
    </div>
    <div class="card-footer text-muted">
       
    </div>
  </div>


<br>
    </div>
</div>



@endsection