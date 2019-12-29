<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
  //add category are here.....

    public function AddCategory(){
      return view('post.add_category');
    }
      //insert category data into database
    public function StoreCategory(Request $request){
          $validatedData = $request->validate([
              'name' => 'required|unique:categories|max:25|min:5',
              'slug' => 'required|unique:categories|max:25|min:5',
          ]);
      $data=array();
      $data['name']=$request->name;
      $data['slug']=$request->slug;
      $category=DB::table('categories')->insert($data);
      return Redirect()->route('all.category')->with('success', ' Category Data Inserted Successfully');
    //return response()->json($data);
  /*  echo "<pre>";
    print_r($data);
    */
    }
    // Show all category are here
    public function AllCategory(){
      $category=DB::table('categories')->get();
      return view('post.all_category',compact('category'));
      // return response()->json($category);
    }
// Show single category id are here
public function ViewCategory($id){
  $category=DB::table('categories')->where('id',$id)->first();
  return view ('post.view_category')->with('cat',$category);
}
// Delete single category id are here
public function DeleteCategory($id){
  $category=DB::table('categories')->where('id',$id)->delete();
  return back()->with('success', ' Category Data Deleted Successfully');
}
// Edit single category id are here
public function EditCategory($id){
    $category=DB::table('categories')->where('id',$id)->first();
  return view('post.editcategory',compact('category'));
}
// Update single category id are here
public function UpdateCategory(Request $request,$id){
  $validatedData = $request->validate([
      'name' => 'required|max:25|min:5',
      'slug' => 'required|max:25|min:5',
  ]);
$data=array();
$data['name']=$request->name;
$data['slug']=$request->slug;
$category=DB::table('categories')->where('id',$id)->update($data);
return Redirect()->route('all.category')->with('success', ' Category Data Updated Successfully');
}
}
