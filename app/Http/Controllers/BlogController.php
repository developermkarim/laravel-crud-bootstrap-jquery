<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

// use  Illuminate\Http\UploadedFile\extention;

class BlogController extends Controller
{

   public function __construct()
   {
    // $this->middleware('auth');
   }
/* This is also for DRY */
public function fileExisting($path)
{
   
    if(File::exists($path)){
        File::delete($path);
    }
}
   /* This is for DRY */
   public function reFactoring($requestData,$blog)
   {

      $blog->title = $requestData->title;
      $blog->detail = $requestData->details;
      $blog->lang_framework = json_encode($requestData->framework);
      $blog->development_sector = $requestData->development;
      $blog->slug = Str::slug($requestData->title);
      $blog->author = "Mahmodul Karim";
      if($requestData->hasfile('image')){

        $file = $requestData->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('assets/images/',$fileName);
        $blog->feature = $fileName;
      }

      
       $blog->save();
   }


    public function addBlog(){
        return view('backend.blog.createBlog');
    }

  

    public function blogStore(Request $requestData)
    {
       
        $name = "Mahmodul Karim";
        //  dd(Auth::user());
        $requestData->validate(array(
            'title'=>'required|unique:posts|max:50|min:5',
            'details'=>'required|min:50',
            'development'=>"required",
            'framework'=>"required",
            // 'featureImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ),
    array(
        'title.required'=>'Your Title is Empty',
        'title.max'=>'You have execeeded more than 50 characters',

        'details.required'=>'Sorry, your filed is empty',
        'details.max'=>'Write maximum 250 characters',
        'details.min'=>'at least 50 characters must be input',
        'framework.required'=>"Plz, check at least one Item",
        'development.required'=>"Select any of them",

        // 'featureImage.required'=>'Plz, Select One file',

    )
    );

// MASS ASSINGMENT SYSTEM
/* $blog = Post::create([
  'title'=>$requestData->title,
  'details'=> $requestData->detail,
 'added_by'=> Auth::user()->name]); */


    $blogPost = new Post();
    $this->reFactoring($requestData,$blogPost);
     return redirect('/all-blogs')->with('insert-success','Your Data is successfully inserted');
    }

    public function allBlogs(){

        $blogPosts = Post::all();
        // dd($blogPosts);


        return view('backend.blog.allBlog',['allBlogPosts'=>$blogPosts,'admin'=>'Mahmodul Karim']);
    }

    public function statusUpdate($id)
    {
       $post = Post::find($id);
    //    $post = Post::find($id,['name','title','detail']);
       if($post->status == true){
        $post->status = false;
       }
       else{
        $post->status = true;
       }
       $status = $post->status;
    //    dd($status);
       $post->save();
       return redirect('/all-blogs')->with('statusChange','StatusChanged successfully');
    }

    public function deletePost($id)
    {
       
        $removePost = Post::find($id);
        $removePost->delete();
        $destination = 'assets/images/' . $removePost->profile_image;
        $this->fileExisting($destination);
       return redirect('/all-blogs')->with('deleteMsg','Post Deleted Successfully');

    }

    public function editPost($id)
    {
       $edit = Post::find($id,['id','title','detail','slug','development_sector','lang_framework','feature']);
      
       $decode = json_decode($edit->lang_framework);
    
    // dd($decode);
       return view('backend.blog.updatePost',['edit'=>$edit,'checkValue'=> $decode]);

     /*   return back()
       ->with('success','You have successfully upload image.')
       ->with('image',$edit);  */

     /*  return redirect('/all-blogs')->with('success','Post Updated successfully'); */

    }

    function updateData(Request $request, $id){

        // dd($requestData);
        $request->validate([
            'title'=>'required|min:5|max:50|unique:posts,title,'.$id,
            'details'=>'required',
        ],
    [
        'title.required'=>"Title must be minimum 5 and maximum 50 characters",
    ]
    );

     $updatePost =  Post::find($id);

    $this->reFactoring($request,$updatePost);
    $destination = 'assets/images/' . $updatePost->profile_image;
        $this->fileExisting($destination);
    return redirect()->route('allblogs')->with('update-success','Post Updated successfully');

    }

    public function viewFullPost($id)
    {
        $showBlog = Post::find($id);
        // dd($showBlog);
      return view('backend.blog.showPost',compact('showBlog'));
    }

}
