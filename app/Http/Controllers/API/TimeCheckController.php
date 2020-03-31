<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\EventOrg;
use App\Attendance;
use Carbon\Carbon;
class TimeCheckController extends BaseController
{
 
    public function index(Request $request)
    {
        $timein_am = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timein_am, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30'));
        
        if($timein_am){
       
            //$attendance  = Attendance::firstOrNew(['student_id' => $request->get('student_id'), 'Date(created_at)' => Carbon::today()]);
            $attendance = Attendance::where('student_id', $request->get('student_id'))
                        ->whereDate('created_at', Carbon::today()->toDateString()) 
                        ->first();

            if($attendance){
                if($attendance->timein_am != ""){
                    return "Already Time In";
                }
            }
            else{ 
                $attendance = new Attendance();
            }
            $attendance->organization_id = $request->get('org_id');
            $attendance->student_id =  $request->get('student_id');
            $attendance->event_id =  $timein_am[0]->id;
            $attendance->timein_am = date("Y-m-d H:i:s", time());        
            $attendance->amount = ($attendance->amount + $attendance->event->fines);
            $attendance->save();

            return "Succesfully Time In";
        }

        $timeout_am = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timeout_am, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30'));
        if($timeout_am){
            $attendance = Attendance::where('student_id', $request->get('student_id'))
            ->whereDate('created_at', Carbon::today()->toDateString()) 
            ->first();
            
            if($attendance){
                if($attendance->timeout_am != ""){
                    return "Already Time Out";
                }
            }
            else{ 
                $attendance = new Attendance();
            }

          $attendance->organization_id = $request->get('org_id');
          $attendance->student_id =  $request->get('student_id');
          $attendance->event_id =  $timeout_am[0]->id;
          $attendance->timeout_am = date("Y-m-d H:i:s", time());
          $attendance->amount = ($attendance->amount + $attendance->event->fines);
          $attendance->save();
          return "Succesfully Time Out";
        }

        $timein_pm = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timein_pm, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30'));
        if($timein_pm){
            $attendance = Attendance::where('student_id', $request->get('student_id'))
            ->whereDate('created_at', Carbon::today()->toDateString()) 
            ->first();

            if($attendance){
                if($attendance->timein_pm != ""){
                    return "Already Time in";
                }
            }
            else{ 
                $attendance = new Attendance();
            }
         $attendance->organization_id = $request->get('org_id');
         $attendance->student_id =  $request->get('student_id');
         $attendance->event_id =  $timein_pm[0]->id;
         $attendance->timein_pm =  date("Y-m-d H:i:s", time());
         $attendance->amount = ($attendance->amount + $attendance->event->fines);
         $attendance->save();
         return "Succesfully Time In";

        }

        $timeout_pm = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timeout_pm, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30'));
        if($timeout_pm){
            $attendance = Attendance::where('student_id', $request->get('student_id'))
            ->whereDate('created_at', Carbon::today()->toDateString()) 
            ->first();

            if($attendance){
                if($attendance->timeout_pm != ""){
                    return "Already Time Out";
                }
            }
            else{
                $attendance = new Attendance();
            }

           $attendance->organization_id = $request->get('org_id');
           $attendance->student_id =  $request->get('student_id');
           $attendance->event_id = $timeout_pm[0]->id;
           $attendance->timeout_pm = date("Y-m-d H:i:s", time());
           $attendance->amount = ($attendance->amount + $attendance->event->fines);
           $attendance->save();
           return "Succesfully Time Out";
        }


        return 'No Attendance';
    }
}
