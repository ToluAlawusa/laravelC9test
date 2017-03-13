@extends('layouts.master')
@section('content')

    <div class="wrapper">
      <h1 id="register-label">Admin Register</h1>
  		<hr>
  		<form id="register"  action ="{{ route('adminregister') }}" method ="POST">
              
  			<div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('firstname') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
  				<label>first name:</label>
  				<input type="text" name="firstname" placeholder="first name">
  			</div>
  			<div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('lastname') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif 
  				<label>last name:</label>	
  				<input type="text" name="lastname" placeholder="last name">
  			</div>
  			<div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('email') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif  
  				<label>email:</label>
  				<input type="text" name="email" placeholder="email">
  			</div>
  			<div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('password') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif  
  				<label>password:</label>
  				<input type="password" name="password" placeholder="password">
  			</div>
  			<div>
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('confirm_password') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif 
  				<label>confirm password:</label>	
  				<input type="password" name="confirm_password" placeholder="password">
  			</div>
          <input type="submit" name="register" value="register">
          <input type="hidden" value="{{ Session::token() }}" name="_token">
  		</form>

  		<h4 class="jumpto">Have an account? <a href="{{ route('adminlogin') }}">login</a></h4>
    </div>




@endsection
