<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Organization;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    private $active;
    private $is_admin;
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'organization_id' => '',
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

   
    protected function create(array $data)
    {
        
        if($data['organization'] == ""){
            $active = 1;
        }else{
           $active = 0; 
        }
        return User::create([
            'name' => $data['name'],
            'organization_id' => $data['organization'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'active' => $active,
            'is_admin' => $active,
            //'password' => $data['password'],
        ]);
    }
    public function index()
    {
        $org = Organization::all();
        return view('vendor.sbadmin2.register', compact('org'));
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

  
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

}
