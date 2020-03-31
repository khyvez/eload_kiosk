<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Organization;
use Auth;
use App\User;
class OrganizationController extends BaseController
{
    public function store(Request $request)
    {
     
       $org = User::find($request->get('user_id'))->organization;
   
      if($org){
        $organization = Organization::find($org->id);
  
      }else{
        $organization = new Organization();
      }
      $organization->name = $request->get('name');
      $organization->save();

        $user = User::find($request->user_id);
        $user->organization_id = $organization->id;
       $user->save();
        return $this->sendResponse($organization, 'Organization succesfully set');
      
    }
    public function index()
    {
        $org_id = Auth::user()->organization_id;
       $organization = Organization::find($org_id);
      //  return $org_id;
      //dd(Auth::user()->organization);
        return $this->sendResponse($organization, 'Organization succesfully retrieved');
      
    }
}
