
@extends('layouts.master')
@section('content')


<div class="wrapper">
<h1 id="login-label">Admin Login</h1>
    <hr>
        <form id="login" action="{{ route('adminlogin') }}" method="POST">

            @if(Session::has('fail'))
                <span class="err">{{ Session::get('fail') }}</span>
            @endif
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
            <input type="submit" name="submit" value="login">
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>

    <h4 class="jumpto">Don't have an account? <a href="{{ route('adminregister') }}">register</a></h4>
  </div>  


@endsection
