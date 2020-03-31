@extends('sbadmin2::master')

@section('body_class', 'bg-gradient-primary')

@section('body')
<div class="container">


	<div class="card o-hidden border-0 shadow-lg my-5">
	  <div class="card-body p-0">
	    <!-- Nested Row within Card Body -->
	    <form class="user row" method="POST" action="{{ route('register') }}">
				@csrf
		  <div class="col-lg-5  d-lg-block p-5">
				<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Organization!</h1>
					  </div>
						<div class="form-group">
						
						  <select class="form-control" name="organization" id="organization">
							  <option value=""></option>
							  @foreach ($org as $item)
						  <option value="{{$item->id}}">{{ $item->name}}</option>
							  @endforeach
							
						  </select>
					</div>
				
					<div class="form-group text-right">
						<button class="btn btn-link">or Create New</button>
					</div>
						
		  </div>
		 
	      <div class="col-lg-7">
	        <div class="p-5">
	          <div class="text-center">
	            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
	          </div>
			

	            <div class="form-group row">
	              <div class="col">
	                <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName" placeholder="Full Name">
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				
				@enderror  
				</div>
	             </div>
	            <div class="form-group">
	              <input type="text" name="username" class="form-control form-control-user @error('username') is-invalid @enderror" id="exampleInputEmail" placeholder="Username">
				  @error('username')
				  <span class="invalid-feedback" role="alert">
					  <strong>{{ $message }}</strong>
				  </span>
			  @enderror

				</div>
	            <div class="form-group row">
	              <div class="col-sm-6 mb-3 mb-sm-0">
	                <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror id="exampleInputPassword" placeholder="Password">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror  
				</div>
	              <div class="col-sm-6">
	                <input name="password_confirmation" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
	              </div>
	            </div>
	            <button type="submit" class="btn btn-primary btn-user btn-block">
	              Register Account
				</button>
	            <hr>
	            
	          
	          <hr>
	          <div class="text-center">
	            <a class="small" href="forgot-password.html">Forgot Password?</a>
	          </div>
	          <div class="text-center">
	            <a class="small" href="login">Already have an account? Login!</a>
	          </div>
	        </div>
		  </div>
		
	    </form>
	  </div>
	</div>

</div>
@endsection