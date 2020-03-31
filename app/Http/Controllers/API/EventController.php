<?php

namespace App\Http\Controllers\API;
use Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\EventOrg;
use Carbon\Carbon;
use Auth;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;


class EventController extends BaseController
{
  
    public function index()
    {
       
        $data   = EventOrg::all();
        return $data;
    //    return $this->sendResponse($data->toArray(), 'Events ritrieved successfully.');
       
    }

    public function all_event(Request $request)
    {

        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        
        $query = EventOrg::dataTableQuery($column, $orderBy, $searchValue);
        $data = $query->paginate($length);
        

        return new DataTableCollectionResource($data);
    }
    public function event_name()
    {
        $event = \DB::select(\DB::raw('Select * from event_orgs where Date(timein_am) = Curdate() or Date(timeout_am) = Curdate() or Date(timein_pm) = Curdate() or Date(timeout_pm) = Curdate() '));
        return $this->sendResponse($event, 'Current Event');
      
    }

    public function event_android(Request $request)
    {
        
        $timein_am = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timein_am, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        
        if($timein_am){
       
            return $this->sendResponse($timein_am, 'Time in AM');
      
        }

        $timeout_am = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timeout_am, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        if($timeout_am){
            return $this->sendResponse($timeout_am, 'Time Out AM');
  
        }

        $timein_pm = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timein_pm, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        if($timein_pm){
    
            return $this->sendResponse($timein_pm, 'Time in PM');
          
        }

        $timeout_pm = \DB::select(\DB::raw('SELECT *, minuteDiff from( Select *, Timestampdiff(MINUTE, timeout_pm, now()) as minuteDiff FROM event_orgs) xDerived where minuteDiff between -5 and 30 and organization_id = :orgid'), array('orgid'=>$request->get('org_id'),));
        if($timeout_pm){
            return $this->sendResponse($timeout_pm, 'Time Out PM');
          
        }

        return $this->sendResponse("", 'No Event');
    }

}
