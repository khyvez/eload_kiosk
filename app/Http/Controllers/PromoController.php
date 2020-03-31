<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;
use Alert;
class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promo::all();
        return view('promo', compact('data'));

    }
    public function smartPromo(Request $request)
    {
      //  $data = Promo::where('network', 'smart')->get(['keyword as id', 'promo as text'])->toBase();
        $data = Promo::where('network', $request->network)->select('keyword as id', 'promo as text')->toBase()->get();
        return $data;

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
     
        $promo = new Promo();



        try{
            $request->validate([
               'network' => 'required',
               'promo' => 'required',
               'keyword' => 'required'
           ]);
       }catch(\Exception $ex){
           return back()->withError('Fill up all the blank fields');
       }
        $promo->network = $request->network;
        $promo->promo = $request->promo;
        $promo->keyword = $request->keyword;
        $promo->save();

       
        return redirect()->route('promo.index')->withSuccessMessage("Succesfully added fine");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        
       $promo->delete();
       return redirect()->route('promo.index')->withSuccessMessage("Succesfully Deleted");
    }
}
