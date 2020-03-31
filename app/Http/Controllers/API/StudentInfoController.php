<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Student;
class StudentInfoController extends BaseController
{
    public function index(Request $request)
    {
       $student = Student::where('student_id', '=', $request->get('student_id'))
            ->where('organization_id', '=', $request->get('org_id'))
            ->get();
        if($student != "[]"){

         

      //return response()->json(['data'=>$student], 200); 
        
      return response()->json($student); 
         // return $this->sendResponse($student->toArray(), 'Student Information');
        }
      //  return $this->sendResponse($student, 'Not Found');
      return response()->json(['error'=>'Not Found'], 401); 
      
    }
    public function contact_list(Request $request)
    {
    
      $student = Student::where('organization_id', $request->get('org_id'))
                ->whereNotNull('contact')
                ->select('contact')
                ->get();
                return $student;
    }
}
