<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AccountController extends Controller
{
    public function index()
    {
        $user = User::org()->get();     
        return view('admin.account', compact('user'));

    }
    public function store(Request $request)
    {

    }
    public function edit(Request $request)
    {

    }
    public function show($id)
    {

    }
    public function destroy()
    {

    }
    public function update(Request $request, $id)
    {
       // dd($request->account_id);
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return back()->withSuccessMessage('Succesfully approved!');

    }
}
