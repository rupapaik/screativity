<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $student=Student::all();
        return view('student.all_student',compact('student'));
          //return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('student.create_student');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'name' => 'required|max:25|min:4',
          'phone' => 'required|unique:students|max:15|min:7',
          'email' => 'required|unique:students|',
      ]);
      $student = new Student;
      $student->name=$request->name;
      $student->email=$request->email;
      $student->phone=$request->phone;
      $student->save();
        return Redirect()->to('student')->with('success', ' Student Insert Successfully');
      //return response()->json($student);
      //return view('student.create_student');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $student=Student::findorfail($id) ;
  //  return response()->json($student);
      return view('student.view_student',compact('student'));
      }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student=Student::findorfail($id);
      return view('student.edit_student',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $student=Student::findorfail($id);
      $student->name=$request->name;
      $student->email=$request->email;
      $student->phone=$request->phone;
      $student->save();
        return Redirect()->to('student')->with('success', ' Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $student=Student::findorfail($id);
      $student->delete();
      return back()->with('success', ' Student Deleted Successfully');
    }

}
