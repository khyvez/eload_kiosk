<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Auth;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.group');
    }

    public function getGroup(Request $request)
    {
        
        if ( $request->input('showdata') ) {
    	    return Group::org()->orderBy('name', 'asc')->get();
            
    	}
        $columns = ['name', 'description'];
        $length = $request->input('length');
        $column = $request->input('column'); 
        $search_input = $request->input('search');

        
        $query = Group::org()->select('name', 'description')->orderBy($columns[$column]);

        if ($search_input) {
            $query->where(function($query) use ($search_input) {
                $query->where('name', 'like', '%' . $search_input . '%');
            });
        }

        $data = $query->paginate($length);
        return ['data' => $data];
 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group();
        

        $group->organization_id = Auth::user()->organization_id;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();
        return "Succesfully Added";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
