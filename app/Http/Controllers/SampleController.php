<?php

namespace App\Http\Controllers;
use Auth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class SampleController extends Controller
{
    use HasApiTokens;
    public function index()
    {
        $response = $client->post('http://127.0.0.1:8000/login', [
            'form_params' => [
              
                'email' => 'kevzone03@gmail.com',
                'password' => '123456789',
               
            ]
        ]);

        // You'd typically save this payload in the session
        $auth = json_decode((string)$response->getBody());
       
    }
    public function logout()
    {
        if(Auth::check()){
            Auth::user()->AauthAccessToken->delete();
        }
    }
    public function show()
    {
        dd("SD");
    }
    public function try(){
       
     
        $client = new Client();

$request = $client->get('http://localhost:8004/api/products', [
    'headers' => [
        'X-CSRF-TOKEN' => csrf_token()
    ]
]);
dd($request->getStatusCode());
/*
$response = $client->post('http://localhost:8000/oauth/token', [
    'form_params' => [
        'client_id' => 2,
        'client_secret' => 'LadeMtdDpLSgfGeMisOXJGO2snJA7Oq6elCGo59X',
        'grant_type' => 'password',
        'username' => 'kevzone03@gmail.com',
        'password' => 'denebianz',
        'scope' => '*',
      
    ]

]);
dd($response->getStatusCode());
    }
    catch(GuzzleException $ex)
    {
        dd($ex);
    }




        $response = $client->post('http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
                'client_id' => 2,
                'client_secret' => 'LadeMtdDpLSgfGeMisOXJGO2snJA7Oq6elCGo59X',
                'grant_type' => 'password',
                'username' => 'kevzone03@gmail.com',
                'password' => 'denebianz',
                'scope' => '*',
              
            ]

        ]);

     
        $auth = json_decode((string)$response->getBody());
        dd( $this->sendResponse($auth, 'Products retrieved successfully.'));
         
        /*
        dd($auth->access_token);
        $response = $client->get('http://127.0.0.1:8000/api/products', [
            'headers' => [
                'Authorization' => 'Bearer' . $auth->access_token,
                'Accept' => 'application/json'
            ]

          
        ]);
        dd($response->getBody());
        */
    
    

    }
    
}
