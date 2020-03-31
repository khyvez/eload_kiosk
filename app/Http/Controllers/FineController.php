<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fine;
use App\EventOrg;
use App\Student;
use Auth;
class FineController extends Controller
{
  public function index()
  {
    $fine = Fine::org()->get();
    return view('admin.fine', compact('fine'));
  }
  public function store(Request $request)
  {
    $fine = new Fine();
    try{
         $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric|between:0.00,99.99',
        ]);
    }catch(\Exception $ex){
        return back()->withError('Fill up all the blank fields');
    }
    $fine->organization_id = Auth::user()->organization_id;
    $fine->name = $request->name;
    $fine->amount = $request->amount;
    
     $fine->save(); 
    return back()->withSuccessMessage("Succesfully added fine");
  }
  public function studentFines()
  {
    $event_name =  EventOrg::org()->get();
    $student_id = 100000000;
    return view('admin.studentfines', compact('event_name', 'student_id'));

  }
  public function show($id){
    $event_name =  EventOrg::org()->get();
    $student_id = $id;
    $student = [];
    return view('admin.studentfines', compact('event_name', 'student_id', 'student'));

  }
  public function showFines(Request $request)
    {
   
        $event_name =  EventOrg::org()->get();
      
        $student = Student::where('student_id', $request->id)
        ->org()
        ->first();
        if($student){
          if($student->fines == 0){
            return back()->withSuccessMessage('Already Paid');
          }else{
            $student_id = $student->id;
            return view('admin.studentfines', compact('event_name', 'student_id', 'student'));
          }
        }else{
           return redirect()->route('fine.show', 100000000000)->withError('No Student Found!');
       }

    }

  public function generateFines()
    {
       $event_name = [];
       $blocks =  Student::org()
       ->groupBy('block')
       ->select('block')
       ->get();
       return view('admin.generatefines', compact('event_name', 'blocks'));
    }

    public function generateFilterFines(Request $request)
    {
        $max_fine = EventOrg::org()
                    ->sum(\DB::raw('fines * signature_count'));

        $event_name = Student::org()
                    ->where('block', $request->block)
                    ->where('fines', 1)
                    ->orderBy('name')
                    ->get();
        
        $blocks =  Student::org()
                    ->groupBy('block')
                    ->select('block')
                    ->get();

       return view('admin.generatefines', compact('event_name', 'max_fine', 'request', 'blocks'));
    }
    public function destroy(Fine $fine)
    {
      $fine->delete();
      return back()->withSuccessMessage('Succesfully deleted');
    }
    public function course()
    {
      
       $course = Student::org()
              ->groupBy('year')
              ->select('year')
              ->get();
            
      
     //    dd($course->toArray());
         return view('admin.sample', compact('course'));
    }
    
}
