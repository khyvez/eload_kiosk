<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Organization;
use App\User;
class OrganizationController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required'
            ]);
        }catch(\Exception $ex)
        {
            return back()->withError('Organization name must not be empty');
         
        }

        $org = Auth::user()->organization;
        if($org){
          $organization = Organization::find($org->id);
    
        }else{
          $organization = new Organization();
        }
        $organization->name = $request->name;
        $organization->save();
  
          $user = User::find(Auth::user()->id);
          $user->organization_id = $organization->id;
         $user->save();
         return back()->withSuccessMessage('Organization name sucesfully set');
        
    }
}
