<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show()
    {
        // $stud=Student::all();
        // if($stud->count()>0)
        // {
        //     return response()->json([
        //         'status'=>200,
        //         'datas'=>1//$stud
        //     ],200);
        // }
        // else{
        //     return response()->json([
        //         'status'=>404,
        //         'datas'=>'No data'
        //     ],404);
        // }
         return Student::all();
    }
    
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'fullname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'age'=> 'required|integer',
        'prof_pic'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);

    // Get the contents of the image file
    $imageData = file_get_contents($request->file('prof_pic')->getRealPath());
    $validatedData['prof_pic'] = $imageData;
    // Hash the password before storing it in the database
    $validatedData['password'] = bcrypt($validatedData['password']);

    // Create a new student with the hashed password
    $stud = Student::create($validatedData);
    if($stud)
       {
           return response()->json([
               'status'=>200,
               'dta'=>'Data added success'
           ],200);
       }
       else{
           return response()->json([
               'status'=>500,
               'dta'=>'Insersion failed'
           ],500);
        }
    // Additional logic...

    //return response()->json($stud, 201);
    //return response()->json($stud, 201);
}
}
