<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Student;
class StudentController extends Controller
{
    public function getStudent()
    {

        $students=Student::all();
        return response()->json(['Students'=>$students,'status'=>200]);
    }
    public function showStudent($id=null)
    {
        $students=$id?Student::find($id):Student::all();
        return response()->json(['Students'=>$students,'status'=>200]);
    }
    public function addStudent(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10',
            'field' => 'required|string|max:255',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create a new student with the validated data
        $student = new Student;
        $student->name=$request->name;
        $student->age=$request->age;
        $student->field=$request->field;
        $student->save();

        return response()->json(['result' => 'success', 'student' => $student], 201);
    }


}
