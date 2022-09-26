@extends('layouts.app')

@section('blog-content')
<div class="container">
    <div class="row">
        <h3 class="text-center"> Post Table</h3>
        <a style="width:10% ;" class="nav-link py-2 text-center mb-3 ms-auto nav-link bg-primary rounded text-white" href="{{route('blog.add')}}">Add Blog Post</a>
        @if (session()->has('deleteMsg'))
        <div class="alert text-center alert-danger alert-dismissible fade show" role="alert">
            <strong>Holy {{$admin}}!</strong> {{session('deleteMsg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('statusChange'))

        <div class="alert w-50 m-auto text-center alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Holy {{$admin}}!</strong>{{session('statusChange')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('insert-success'))

        <div class="alert w-50 m-auto text-center alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Holy {{$admin}}!</strong> {{session('insert-success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @elseif(session()->has('update-success'))
        <div class="alert w-50 m-auto text-center alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Holy {{$admin}}!</strong> {{session('update-success')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif



        <table class="table table-striped table-responsive table-hover" id="table-data">

            <thead>
                <tr>
                    <th scope="col">S/L</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Author</th>
                    <th scope="col">Development Sector</th>
                 
                    <th scope="col">Used In Tech-Company</th>
                    <th scope="col">Feature</th>
                    <th scope="col">Status</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            {{-- {{var_dump($allBlogPosts)}} --}}
            <tbody>
                @forelse ($allBlogPosts as $key => $post)

                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <article>{{Str::limit($post->detail,40)}}</article>
                    </td>
                    <td>{{$admin}}</td>

                    <td>
                        <span>{{$post->development_sector}}</span>
                    </td>
                    <td>
                        @php
                            $framworks = json_decode($post->lang_framework)
                        @endphp

                       @foreach ($framworks as $item)
                           {{$item}},
                       @endforeach
                    </td>
                    <td class="text-center">
                        <img src="{{asset('/assets/images/'.$post->feature)}}" height="50px" width="50px" alt="No image found">
                    </td>

                    <td>
                        <span class="badge rounded-pill {{$post->status ?'bg-success':'bg-danger'}}">

                            {{$post->status ? 'active' : 'deactive'}}
                        </span>
                    </td>
                    <td class="text-center d-flex justify-content-between">

                    
                      <a class="btn bg-success text-white" href="{{route('show.post',$post->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg>
                      {{-- <img class="text-white"  alt="triangle with all three sides equal"
                      
                      width="30px" src="{{url('/assets/images/eye.svg')}}"> --}}
                      </a>
                  


                        <a class="btn btn-primary" href="{{route('blog.update',$post->id)}}">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>

                        {{-- Status Here --}}

                        <a class="btn btn-info" href="{{route('blog.status',$post->id)}}">Status</a>

                        {{-- Delete Icon --}}

                       
                        <button class="btn bg-danger delete-btn"> <svg class=" bg-danger text-light fw-bold " xmlns="http://www.w3.org/2000/svg" width="20"
                          height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path
                              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                          <path fill-rule="evenodd"
                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                      </svg>
                    </button> 
                    <form  id="formId"  style="display: inline-block" action="{{route('blog.delete',$post->id)}}">
                      @csrf
                      @method('DELETE')
                        </form>
                        {{-- <a class="btn bg-danger" href="{{route('blog.delete',$post->id)}}">
                           </a> --}}
                    </td>
                </tr>


                @empty
                <tr>
                    <td class="text-center fw-bold pt-3" colspan="7">
                        <p>No Data Found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('customjs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
   $(function(){
  
 let btn = $('.delete-btn');
      btn.click(function(){
        var form = $(this).next('form');
      
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   form.submit();
   
  }
})
      })

      $('#table-data').DataTable();
    
  });

</script>

@endpush

@endsection

