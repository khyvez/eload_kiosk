<?php

namespace App\Http\Controllers;
use Calendar;
use Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\EventOrg;
use Auth;
use App\Fine;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
class EventController extends Controller
{
//    Use Alert;
    private $timein_am;
    private $timein_pm;
    private $timeout_am;
    private $timeout_pm;
    private $sig_count;
    public function checkTime(Request $request)
    {

        $client = new \GuzzleHttp\Client();

        $response = $client->get('http://localhost:8005/api/checktime', [
    
        ]);
      
        $response = $response->getBody();  
        $data = json_decode($response);
     
        if($data->message == "Attendance for Time In AM"){
       
            $event_id =  $data->data[0]->id;
            $sendInfo = new \GuzzleHttp\Client();
            $response = $sendInfo->post('http://localhost:8005/api/attendance/timeinam', [
                'form_params' => [
                    'student_id' => $request->student_id,
                    'event_id' => $event_id,
                    'timescan' => date("Y-m-d H:i:s", time())

                ]
            ]);

        }
        elseif($data->message == "Attendance for Time Out AM"){
       
            $event_id =  $data->data[0]->id;
            $sendInfo = new \GuzzleHttp\Client();
            $response = $sendInfo->post('http://localhost:8005/api/attendance/timeoutam', [
                'form_params' => [
                    'student_id' => $request->student_id,
                    'event_id' => $event_id,
                    'timescan' => date("Y-m-d H:i:s", time())

                ]
            ]);

        }
        elseif($data->message == "Attendance for Time In PM"){
       
            $event_id =  $data->data[0]->id;
            $sendInfo = new \GuzzleHttp\Client();
            $response = $sendInfo->post('http://localhost:8005/api/attendance/timeinpm', [
                'form_params' => [
                    'student_id' => $request->student_id,
                    'event_id' => $event_id,
                    'timescan' => date("Y-m-d H:i:s", time())

                ]
            ]);

        }
        elseif($data->message == "Attendance for Time Out PM"){
       
            $event_id =  $data->data[0]->id;
            $sendInfo = new \GuzzleHttp\Client();
            $response = $sendInfo->post('http://localhost:8005/api/attendance/timeoutpm', [
                'form_params' => [
                    'student_id' => $request->student_id,
                    'event_id' => $event_id,
                    'timescan' => date("Y-m-d H:i:s", time())

                ]
            ]);

        }
        

    }
    public function index(){
        $fine = Fine::org()->get();
        $event = EventOrg::org()->get();
        return view('admin.event', compact('fine', 'event'));
        
    }
  
    public function getEvents(Request $request)
    {
       /* $fine = Fine::org()->get();
        $event = EventOrg::org()->get();
        return view('admin.event', compact('fine', 'event'));
        */

        if ( $request->input('showdata') ) {
    	    return EventOrg::org()->orderBy('title', 'asc')->get();
            
    	}
        $columns = ['title', 'timein_am', 'timeout_am', 'timein_pm', 'timeout_pm', 'fines'];
        $length = $request->input('length');
        $column = $request->input('column'); 
        $search_input = $request->input('search');

        $query = EventOrg::org()->select('title', 'timein_am', 'timeout_am', 'timein_pm', 'timeout_pm', 'fines')->orderBy($columns[$column]);

        if ($search_input) {
            $query->where(function($query) use ($search_input) {
                $query->where('title', 'like', '%' . $search_input . '%');
            });
        }

        $data = $query->paginate($length);
        return ['data' => $data];
    }
    public function destroy($id)
    {
       // ALert::question('Question', 'asd');
         
        $event = EventOrg::find($id);
    
        $event->delete();
        return back()->withSuccessMessage('Succesfully event deleted');
    }
    public function store(Request $request)
    {

        $this->sig_count = 0;

        try{
        $data = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'fines' => 'required',

        ]);
        }catch(\Exception $ex){
            return back()->withError("Some fields need to fill up");
        }

        if(\Carbon\Carbon::parse($request->date) <= \Carbon\Carbon::today())
        {
            return back()->withError("Event date error");
        }
      

         if($request->timein_am == null){
            $timein_am = "";  
         }else{
            $timein_am = date('Y-m-d H:i:s', strtotime($request->date . $request->timein_am));   
            $this->sig_count++;
         }

         if($request->timeout_am == null){
            $timeout_am = "";
         }else{
            $timeout_am = date('Y-m-d H:i:s', strtotime($request->date . $request->timeout_am));
            $this->sig_count++;
         }

         if($request->timein_pm == null){
            $timein_pm = "";
         }else{
            $timein_pm = date('Y-m-d H:i:s', strtotime($request->date . $request->timein_pm));
            $this->sig_count++;
         }

         if($request->timeout_pm == null){
            $timeout_pm = "";
         }else{
            $timeout_pm = date('Y-m-d H:i:s', strtotime($request->date . $request->timeout_pm));
            $this->sig_count++;
         }

        $event = new EventOrg();
        $event->organization_id = Auth::user()->organization_id;
       
        $event->title = $request->title;
        $event->timein_am = $timein_am;
        $event->timeout_am = $timeout_am;

      
        $event->timein_pm = $timein_pm;
        $event->timeout_pm = $timeout_pm;
        $event->fines = $request->fines;
        $event->signature_count = $this->sig_count;
        
        $event->save();
      
        return back()->withSuccessMessage('Succesfully added');

    }
    public function event_list(Request $request)
    {
        /*

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        
        $query = EventOrg::org()->dataTableQuery($column, $orderBy, $searchValue);
        $data = $query->paginate($length);
        

        return new DataTableCollectionResource($data);
        */

    }
    public function update(Request $request, $id)
    {
        
        $event = EventOrg::find($id);
        $event->title = $request->title;
        $event->timein_am = $request->timein_am;
        $event->timeout_am = $request->timeout_am;
        $event->timein_pm = $request->timein_pm;
        $event->timeout_pm = $request->timeout_pm;
        $event->save();
        
        return "Succesfully updated";
    }

}
