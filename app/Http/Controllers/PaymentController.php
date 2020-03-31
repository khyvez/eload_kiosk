<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Auth;
use App\Student;
class PaymentController extends Controller
{
   
    public function index()
    {
        $payment = [];
        $request = [];
        $paymentTotal = "";
        return view('admin.payment1', compact('payment','request', 'paymentTotal'));
    }
    public function filterPayment(Request $request)
    {
        $payment = Payment::org()
                    ->whereBetween('created_at', [$request->datefrom, $request->dateto])
                    ->get();
        $paymentTotal = Payment::org()
                     ->whereBetween('created_at', [$request->datefrom, $request->dateto])
                    ->sum('amount');
        return view('admin.payment1', compact('payment', 'request', 'paymentTotal'));
                    // dd($payment);
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        if($request->id){

        $payment = new Payment();
        $payment->organization_id = Auth::user()->organization_id;
        $payment->user_id = Auth::user()->id;
        $payment->student_id = $request->id;
        $payment->amount = $request->amount;
        $payment->save();

     
        $student = Student::find($request->id);
          $student->fines = 0;
          $student->save();
    
          return back()->withSuccessMessage('Sucesfully paid');
        }else
        {
          return back()->withError('No student');
        }
      
   
    }
    
    public function show(Payment $payment)
    {
        //
    }


    public function edit(Payment $payment)
    {
        //
    }

 
    public function update(Request $request, Payment $payment)
    {
        //
    }

 
    public function destroy(Payment $payment)
    {
        //
    }
}
