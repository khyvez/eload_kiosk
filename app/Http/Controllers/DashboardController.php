<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Calendar;
use Validator;
use Auth;

use App\EventOrg;
use App\Attendance;
use App\Charts\AttendanceChart;
use App\Charts\PaidChart;
use App\Charts\PopulationChart;
use RealRashid\SweetAlert\Facades\Alert;
use App\Fine;
use App\Payment;
class DashboardController extends Controller
{
    public function checklogin(Request $request)
    {
        

        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'active' => 1

        );
        if(Auth::attempt($user_data))
        {

            //return Auth::user()->organization_id;
            return  redirect()->route('dashboard');

        }
        else{
            return back()->withErrors("Invalid");
        }
    }
    public function index()
    {
        //EVENTS CALENDAR
        $data   = EventOrg::org()->get();
        
        $events = [];
        if(count($data))
        {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    $value->title, true, new \DateTime($value->timein_pm), new \DateTime($value->timeout_pm.' +1 day'), null,
                    ['color' => '#f05050', 'url' => '#',]
                );
            }
        }  
        $calendar = Calendar::addEvents($events);

        //ATTEND NOW
        $attend_now = \DB::select(\DB::raw('SELECT students.name, attendances.updated_at FROM attendances left join students on attendances.student_id = students.id where Date(attendances.created_at) = Curdate() and attendances.organization_id = :orgid order by attendances.updated_at desc limit 5'), array('orgid'=>Auth::user()->organization_id,));


        //EVENT NAME CURRENT
        $event_name = \DB::select(\DB::raw('Select * from event_orgs where (Date(timein_am) = Curdate() or Date(timeout_am) = Curdate() or Date(timein_pm) = Curdate() or Date(timeout_pm) = Curdate()) and organization_id = :orgid'), array('orgid'=>Auth::user()->organization_id,));
        
        //MAXIMUM FINE
        $max_fines = EventOrg::where('organization_id', '=', Auth::user()->organization_id)
        ->sum(\DB::raw('fines * signature_count'));

        //ATTENDANCE COUNT
        $attend = \DB::select(\DB::raw('SELECT count(id) as pila FROM attendances where Date(created_at) = curdate() and organization_id = :orgid'), array('orgid'=>Auth::user()->organization_id,));
        
       
        $attend_count = $attend[0]->pila;

        //organization name
        $organization =   Auth::user()->organization;

        //Amount Paid
        $paid = Payment::org()
                ->sum('amount');
                


        //Population CHART
       $chart1 = new PopulationChart;
       $pop = Student::org()->get()
            ->groupBy('program')
            ->map(function ($item) {
            return $item->count();
         });
      
       $chart1->labels($pop->keys());
        $chart1->dataset('Course Population', 'bar', $pop->values())->backgroundColor(['#FF4D4D', '#128DEB', 'blue']);

         //Attendance Chart

         $attchart = new AttendanceChart;
         $attdata = Attendance::org()->get()
    
         ->groupBy('event_id')
       
         ->map(function ($item) {
        
         return $item->count();
         });
        $labels = $attdata->keys()->map(function ($item)
        {
            $event_name = EventOrg::find($item);
            return $event_name->title;
        });

        $attchart->labels($labels->values());
        $attchart->dataset('Attendance', 'line', $attdata->values())->backgroundColor(['#FF4D4D', '#128DEB', 'blue']);


      //PaidChart
        $paidchart = new PaidChart;
        $paiddata = Student::where('fines', 0)
                    ->org()
                    ->get()
                    ->groupBy('program');

        $unpaid = Student::where('fines', 1)
                    ->org()
                    ->get();
        $paidsummary = $paiddata->put('Unpaid', $unpaid)
                    ->map(function ($item) {
                        return $item->count();
                    });
                    
        $paidchart->labels($paidsummary->keys());
        $paidchart->dataset('Payment Summary', 'pie', $paidsummary->values())->backgroundColor(['#FF4D4D', '#128DEB','#00CD50', 'blue']);
    
        return view('admin.dashboard', compact('calendar', 'attend_now', 'event_name', 'organization', 'max_fines', 'attend_count', 'chart1', 'paidchart', 'attchart', 'paid'));
    }
  
}
