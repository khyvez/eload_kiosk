<?php



namespace App\Http\Controllers\API;



use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\User;

use Illuminate\Support\Facades\Auth;

use Validator;



class RegisterController extends BaseController

{
    public function logout()
    {
       // dd(Auth::user()->accessToken());
       dd(Auth::user()->accessToken);
        if(Auth::check()){
            dd(Auth::user()->access_token);
        }
    }

    /**

     * Register api

     *

     * @return \Illuminate\Http\Response

     */

    public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required',

            'c_password' => 'required|same:password',

        ]);



        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }



        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $success['name'] =  $user->name;



        return $this->sendResponse($success, 'User register successfully.');

    }

    public function login(){ 
        if(Auth::attempt(['username' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['org'] = $user->organization_id;
            // return response()->json(['success' => $success], 200); 
            return response()->json($success, 200);

        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 

    }
   
}