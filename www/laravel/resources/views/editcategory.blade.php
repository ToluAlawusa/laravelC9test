@extends('layouts.master')
@section('content')

	<div class="wrapper">
    <h1 id="register-label">Edit Category</h1>
	<hr>

	<form id="register" action="/editcategory/{!! $id !!}/" method="POST">
		    @if (count($errors) > 0)
		        <div class="alert alert-danger">
		            @foreach ($errors->get('cname') as $error)<span class="err">{{ $error }}</span>@endforeach    
		        </div>
	        @endif    
	    <div>
		<label>category name:</label>
		<input type="text" name="cname" placeholder="Post name" value="{!! $cat->category_name !!}" >
		</div>
	

		<input type="submit" name="upd" value="UPDATE">
		<input type="hidden" value="{{ Session::token() }}" name="_token">
	</form>

		
	</div>

@endsection