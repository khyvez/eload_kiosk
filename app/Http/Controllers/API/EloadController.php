<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Eload;
class EloadController extends BaseController
{
    
    public function index()
    {
       
        $data  = Eload::whereDay('created_at', now()->day)->where('status', 1)->get();

        //if(count($data) !=0){
        return $data;
        
   
        

    //    return $this->sendResponse($data->toArray(), 'Events ritrieved successfully.');
       
    }
   
    public function loaded(Request $request)
    {
      
        $eload = Eload::find($request->id);
        $eload->status = $request->status;
        $eload->save();

        return "Success";
        
    }
}
