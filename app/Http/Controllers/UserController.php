<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class UserController extends Controller
{
    public function getUsers(Request $request)
    {
    	if ( $request->input('showdata') ) {
    	    return Student::org()->orderBy('name', 'asc')->get();
            
    	}
        $columns = ['name', 'program', 'student_id', 'year', 'sex', 'block'];
        $length = $request->input('length');
        $column = $request->input('column'); 
        $search_input = $request->input('search');

        $query = Student::org()->select('name', 'program', 'student_id', 'year', 'sex', 'block')->orderBy($columns[$column]);

        if ($search_input) {
            $query->where(function($query) use ($search_input) {
                $query->where('name', 'like', '%' . $search_input . '%')
                ->orWhere('program', 'like', '%' . $search_input . '%')
                ->orWhere('block', 'like', '%' . $search_input . '%')
                ->orWhere('student_id', 'like', '%' . $search_input . '%');
            });
        }

        $users = $query->paginate($length);
        return ['data' => $users];
    }

    public function deleteUser(Student $student) {

        if($student) {
            $student->delete();
        }
        return 'user deleted';
    }
    public function show(Student $student)
    {
        return $student;
    }
    public function update(Request $request, $id)
    {
        
        $student = Student::find($id);
        $student->student_id = $request->student_id;
        $student->name = $request->name;
        $student->sex = $request->sex;
        $student->birthday = $request->birthday;
        $student->contact = $request->contact;
        $student->year = $request->year;
        $student->block = $request->block;
        $student->program = $request->program;
    
         $student->save();
         return "Succesfully updated";
    }
}
