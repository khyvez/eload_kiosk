<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\EventOrg;
use App\Fine;
class FineController extends BaseController
{
    public function index()
    {

        $event = EventOrg::first();
        return $this->sendResponse($event, 'Maximum fines retrieved successfully.');
      

    }
    public function maximum_fine(Request $request)
    {
        
        $max_fine = EventOrg::where('organization_id', '=', $request->org_id)
                           ->sum(\DB::raw('fines * signature_count'));
        
        return $this->sendResponse($max_fine, 'Maximum fines retrieved successfully.');
       
    }
    public function store(Request $request)
    {
        $fine = new Fine();
        $fine->name = $request->name;
        $fine->amount = $request->amount;

        $fine->save();
        return $this->sendResponse($fine, 'Fines successfully created.');
       
    }
}
