<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Calendar;
use Validator;
use Auth;

use App\EventOrg;
use App\Attendance;
use RealRashid\SweetAlert\Facades\Alert;
use App\Fine;
use App\Charts\AttendanceChart;
class ApirequestController extends Controller
{
    public function dashboardRequest()
    {
    
        $client = new \GuzzleHttp\Client();

        $request = $client->get('http://localhost:8005/api/events');
    
        $response = $request->getBody();  
        
        $data = json_decode($response);
       
        $events = [];
        if(count($data->data))
        {
            foreach ($data->data as $key => $value)
            {
                $events[] = Calendar::event(
                    $value->title, true, new \DateTime($value->timein_am), new \DateTime($value->timeout_pm.' +1 day'), null,
                    ['color' => '#f05050', 'url' => 'pass here url and any route',]
                );
            }
        }  
        $calendar = Calendar::addEvents($events);


        
        $client = new \GuzzleHttp\Client();

        $request = $client->get('http://localhost:8005/api/attendance/now');
    
        $response = $request->getBody();  
        
        $data = json_decode($response);
       
        $attend_now = $data->data;



        $client = new \GuzzleHttp\Client();

        $request = $client->get('http://localhost:8005/api/event_name');
    
        $response = $request->getBody();  
        
        $data = json_decode($response);
       
        $event_name = $data->data;

        //organization name
        $organization =   Auth::user()->organization;

        //maxim fines
        $client = new \GuzzleHttp\Client();

        $request = $client->post('http://localhost:8005/api/max_fine', [
            'form_params' => [
                'org_id' => Auth::user()->organization_id,
               
            ]
        ]);
        $response = $request->getBody();  
        $data = json_decode($response);
        $max_fines = $data->data;

        //attendance count
        $client = new \GuzzleHttp\Client();

        $request = $client->post('http://localhost:8005/api/attend_count', [
            'form_params' => [
                'org_id' => Auth::user()->organization_id,
               
            ]
        ]);
        $response = $request->getBody();  
        $data = json_decode($response);
     
        $attend_count = $data->data[0]->pila;
     



        //CHART
       $chart1 = new AttendanceChart;
        $bsce = Student::where('program', 'BSCE')->count();
        $bscpe = Student::where('program', 'BSCPE')->count();
        
       $chart1->labels(['BSCE', 'BSCPE']);

       $chart1->dataset('Course Population', 'bar', [$bsce, $bscpe])->backgroundColor(['#FF4D4D', '#128DEB', 'blue']);
                
      // $student = Student::where(\DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();

        //END CHART
        return view('admin.dashboard', compact('calendar', 'attend_now', 'event_name', 'organization', 'max_fines', 'attend_count', 'chart1'));
    }
  
  
  
        

}
