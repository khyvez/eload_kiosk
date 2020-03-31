<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\EventOrg;
use App\Attendance;
use App\Student;
class AttendanceController extends Controller
{
    public function index()
    {
        $attends = [];
        $event = EventOrg::org()->get();
        return view('admin.attend_now', compact('attends', 'event'));
    }
    public function show(Request $request)
    {
        $attends = Attendance::org()
                    ->where('event_id', $request->event)
                    ->get();
        $event_name = EventOrg::org()
                    ->where('id', $request->event)
                    ->first();
        $event = EventOrg::org()->get();

        $attend_count = Attendance::org()
                    ->where('event_id', $request->event)
                    ->count();
        return view('admin.attend_now', compact('attends', 'event_name', 'event', 'attend_count'));
    }
}
