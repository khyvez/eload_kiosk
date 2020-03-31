<?php

namespace App\Http\Controllers;

use App\Eload;
use Illuminate\Http\Request;
use Alert;

class EloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getStatus()
     {
         $data  = Eload::latest()->first();

            if($data->status == 0){
                return "OK";
            }elseif($data->status == 1)
            {
                return "Processing";
            }elseif($data->status == 2){
                return "Error";
            }
            
        
     }
    public function index()
    {
        $eload = Eload::latest()->get();

        return view('history', compact('eload'));
    }
    public function dailyreport()
    {
        $eload = Eload::whereDay('created_at', now()->day)->latest()->get();

        return view('daily', compact('eload'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //   Alert::info('Info Title', 'Info Message');
/*
        try{
            $data = $request->validate([
                'contact' => 'required',
                'load_amount' => 'required',
   
    
            ]);
            }catch(\Exception $ex){
               return back()->withError("Some fields need to fill up");
                //dd($request->all());
            }
            */


            $eload = new Eload();
            
            if($request->loadtype == "regular"){
              
               
                $eload->keyword = $request->load_amount;
            }else{
             
                $eload->keyword = $request->keyword;
            }
            $eload->load_amount = $request->load_amount;
            $eload->contact = $request->contact;
            $eload->purchase_amount = $request->load_amount + 3 ;
            $eload->menu_number = $request->menu_number;
            $eload->network = $request->network;
            $eload->save();
            return back()->withSuccessMessage('Succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eload  $eload
     * @return \Illuminate\Http\Response
     */
    public function show(Eload $eload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eload  $eload
     * @return \Illuminate\Http\Response
     */
    public function edit(Eload $eload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eload  $eload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eload $eload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eload  $eload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eload $eload)
    {
        //
    }
}
