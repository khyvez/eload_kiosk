<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Attendance;
use App\Student;
class AttendanceController extends BaseController
{
    public function attend_now()
    {
        $data = \DB::select(\DB::raw('SELECT students.name, attendances.updated_at FROM attendances left join students on attendances.student_id = students.id where Date(attendances.created_at) = Curdate() order by attendances.updated_at desc limit 5'));

      
        return $this->sendResponse($data, 'Attendance succesfully retrieved');
      

    }
    public function attend_count(Request $request)
    {
        $timein_am = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timein_am, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        
        if($timein_am){
       
            
        $data = \DB::select(\DB::raw('SELECT count(id) as pila FROM attendances where Date(timein_am) = curdate() and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        return json_encode($data);
        }

        $timeout_am = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timeout_am, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        if($timeout_am){
            
        $data = \DB::select(\DB::raw('SELECT count(id) as pila FROM attendances where Date(timeout_am) = curdate() and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        return json_encode($data);
  
        }

        $timein_pm = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timein_pm, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        if($timein_pm){
    
          
        $data = \DB::select(\DB::raw('SELECT count(id) as pila FROM attendances where Date(timein_pm) = curdate() and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        return json_encode($data);
        }

        $timeout_pm = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timeout_pm, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        if($timeout_pm){
          
        $data = \DB::select(\DB::raw('SELECT count(id) as pila FROM attendances where Date(timeout_pm) = curdate() and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        return json_encode($data);
        }
        $data = 0;
        return json_encode($data);
       

        /*
        $data = \DB::select(\DB::raw('SELECT count(id) as pila FROM attendances where Date(created_at) = curdate() and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        
        return json_encode($data);
        */
        //return $this->sendResponse($data, 'Attendance succesfully retrieved');
      

    }
    public function attend_android(Request $request)
    {
    
        $data = \DB::select(\DB::raw('SELECT students.name, attendances.updated_at FROM attendances left join students on attendances.student_id = students.id where Date(attendances.created_at) = Curdate()  and attendances.organization_id = :orgid order by attendances.updated_at desc limit 5'), array('orgid'=>$request->get('org_id'),));
        if($data){
        return $this->sendResponse($data, 'Attendance Recent');
        }
        return $this->sendResponse($data, 'No recent attendance');
    }
    /*
    public function timein_am(Request $request)
    {
       // $attendance = new Attendance();
        $attendance  = Attendance::firstOrNew(['student_id' => $request->get('student_id')]);
         
        $attendance->student_id =  $request->get('student_id');
        $attendance->event_id =  $request->get('event_id');
        $attendance->timein_am =  $request->get('timescan');
        $attendance->save();
        return "OK";

    }
    public function timeout_am(Request $request)
    {
        $attendance  = Attendance::firstOrNew(['student_id' => $request->get('student_id')]);
           
        $attendance->student_id =  $request->get('student_id');
        $attendance->event_id =  $request->get('event_id');
        $attendance->timeout_am =  $request->get('timescan');
        $attendance->save();
        return "OK";
    }
    public function timein_pm(Request $request)
    {
        $attendance  = Attendance::firstOrNew(['student_id' => $request->get('student_id')]);
           
        $attendance->student_id =  $request->get('student_id');
        $attendance->event_id =  $request->get('event_id');
        $attendance->timein_pm =  $request->get('timescan');
        $attendance->save();
        return "OK";
    }
    public function timeout_pm(Request $request)
    {
        $attendance  = Attendance::firstOrNew(['student_id' => $request->get('student_id')]);
        $attendance->student_id =  $request->get('student_id');
        $attendance->event_id =  $request->get('event_id');
        $attendance->timeout_pm =  $request->get('timescan');
        $attendance->save();
        return "OK";
    }
    */

}
