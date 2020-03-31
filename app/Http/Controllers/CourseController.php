<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Auth;
class CourseController extends Controller
{
    public function index()
    {
        $course = Course::org()->get();

        return view('admin.course', compact('course'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $course = new Course();
        try{
        $request->validate([
            'name' => 'required'
        ]);
        }catch(\Exception $ex)
        {
            return back()->withError('Fill up blank field!');
        }
        
        $course->organization_id = Auth::user()->organization_id;
        $course->name = $request->name;
        $course->save();

        return back()->withSuccessMessage('Succesfully added course');

    }

    public function show(Course $course)
    {
        //
    }
   public function edit(Course $course)
    {
        //
    }
    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
