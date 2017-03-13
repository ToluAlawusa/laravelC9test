@extends('layouts.master')
@section('content')

    <div class="wrapper">
        <h1 id="register-label">Add Category</h1>
		<hr/>

		<form id="register" action="{{ route('addcategory') }}" method="POST">
		<div>

			@if (count($errors) > 0)
		        <div class="alert alert-danger">
		            @foreach ($errors->get('cname') as $error)<span class="err">{{ $error }}</span>@endforeach    
		        </div>
	        @endif
    
			<label>category name:</label>
			<input type="text" name="cname" placeholder="Post Title">
			<input type="hidden" value="{{ Session::token() }}" name="_token">
		
		</div>

		<input type="submit" name="sub" value="ADD">
		</form>
	</div>

@stop