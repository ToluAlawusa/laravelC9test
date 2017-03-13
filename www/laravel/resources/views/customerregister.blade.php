@extends('layouts.cus')
@section('browsertitle')customerregister @stop
@section('content')

<div class="registration-form">
      <form class="def-modal-form" action="{{ route('customerregister') }}" method="POST">
        <div class="cancel-icon close-form"></div>

        <label for="registration-from" class="header"><h3>Customer Registration</h3></label>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('firstname') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
        <input type="text" class="text-field first-name" name="firstname" placeholder="Firstname">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('lastname') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
        
       
        <input type="text" class="text-field last-name" name="lastname" placeholder="Lastname">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('email') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
        
        
        <input type="email" class="text-field email" name="email" placeholder="Email">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('username') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
       
       
        <input type="text" class="text-field username" name="username" placeholder="Username">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('password') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
        
       
        <input type="password" class="text-field password" name="password" placeholder="Password">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->get('confirm_password') as $error)<span class="err">{{ $error }}</span>@endforeach    
            </div>
          @endif
        
        
        <input type="password" class="text-field confirm-password" name="confirm_password" placeholder="Confirm Password">
        
        <input type="submit" class="def-button" name="reg" value="Register">
        <input type="hidden" value="{{ Session::token() }}" name="_token">

        <p class="login-option"><a href=""> Have an account already? Login</a></p>
      </form>
</div>

@endsection