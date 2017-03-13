@extends('layouts.cus')
@section('browsertitle')customerlogin @stop
@section('content')

<div class="login-form">
      <form class="def-modal-form" action="{{ route('customerlogin') }}" method="POST">
        
        <label for="login-form" class="header"><h3>Login</h3></label>

        @if(Session::has('fail'))
            <span class="err">{{ Session::get('fail') }}</span>
        @endif
          
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->get('email') as $error)<span class="err">{{ $error }}</span>@endforeach    
        </div>
        @endif 

        <input type="text" class="text-field email" name="email" placeholder="Email">
        
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->get('password') as $error)<span class="err">{{ $error }}</span>@endforeach    
        </div>
        @endif 

        <input type="password" class="text-field password" name="password" placeholder="Password">
        <!--clear the error and use it later just to show you how it works -->
        
        <input type="submit" class="def-button login" name="login" value="Login">
        <input type="hidden" value="{{ Session::token() }}" name="_token">
      </form>
    
  </div>

@endsection