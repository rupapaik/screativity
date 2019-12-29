<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function write(){
     	$category=DB::table('categories')->get();
     	return view('post.writepost',compact('category'));
     }

     //insert image in public folder and database
public function StorePost(Request $request){
    	$validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_full_name = time().'.'.$image->getClientOriginalExtension();
        $upload_path='frontend/images/';
        $image_url=$upload_path.$image_full_name;
        $image->move($upload_path, $image_full_name);
        $data['image']=$image_url;
    }

    	 DB::table('posts')->insert($data);
    	 return Redirect()->route('all.post')->with('success','Image Uploaded Successfully');
    }

//view all post.....
public function AllPost(){
$post=DB::table('posts')
->join('categories','posts.category_id','categories.id')
->select('posts.*','categories.name')
->get();
  return view ('post.allpost',compact('post'));
}

//view single post.....
public function ViewPost($id)
{
  $post=DB::table('posts')
  ->join('categories','posts.category_id','categories.id')
  ->select('posts.*','categories.name')
  ->where('posts.id',$id)
  ->first();
//  return response()->json($post);
return view('post.view_post',compact('post'));
}
//Edit single post.....
public function EditPost($id){
  $category=DB::table('categories')->get();
  $post=DB::table('posts')->where('id',$id)->first();
  return view('post.edit_post',compact('category','post'));
}
//Update single post.....
public function UpdatePost(Request $request,$id){
  $validatedData = $request->validate([
         'title' => 'required|max:200',
         'details' => 'required',
         'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
     ]);

  $data=array();
  $data['title']=$request->title;
  $data['category_id']=$request->category_id;
  $data['details']=$request->details;

  if ($request->hasFile('image')) {
    $image = $request->file('image');
    $image_full_name = time().'.'.$image->getClientOriginalExtension();
    $upload_path='frontend/images/';
    $image_url=$upload_path.$image_full_name;
    $image->move($upload_path, $image_full_name);
    $data['image']=$image_url;
      unlink($request->old_photo);
  }

   DB::table('posts')->where('id',$id)->update($data);
   return Redirect()->route('all.post')->with('success','Post Updated Successfully');
  }
//Delete single post---------------
public function DeletePost($id){
  $post=DB::table('posts')->where('id',$id)->first();
  $image=$post->image;
  unlink($image);
  $delete=DB::table('posts')->where('id',$id)->delete();
  return Redirect()->back()->with('success','Post Deleted Successfully');
}
}
