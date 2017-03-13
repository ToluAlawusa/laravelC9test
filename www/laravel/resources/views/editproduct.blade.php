@extends('layouts.master')
@section('content')

    <div class="wrapper">
    <h1 id="register-label">Edit Product</h1>
    <hr>

    <form id="register" action="/editproduct/{!! $id !!}/" method="POST" enctype="multipart/form-data">
        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->get('bookname') as $error)<span class="err">{{ $error }}</span>@endforeach    
                </div>
            @endif
            <label>Book name:</label>
            <input type="text" name="bookname" placeholder="book name" value="{!! $prodid->product_name !!}">
        </div>

        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->get('author') as $error)<span class="err">{{ $error }}</span>@endforeach    
                </div>
            @endif
            <label>Author:</label>
            <input type="text" name="author" placeholder="author" value="{!! $prodid->author_name !!}">
        </div>

        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->get('price') as $error)<span class="err">{{ $error }}</span>@endforeach    
                </div>
            @endif
            <label>Price:</label>
            <input type="text" name="price" placeholder="Price" value="{!! $prodid->price !!}">
        </div>
            
        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->get('category') as $error)<span class="err">{{ $error }}</span>@endforeach    
                </div>
            @endif
            <label>Select Category:</label>
            <select name="category">
            <option value=""> Select Category </option>
            @foreach ($cat as $cat)
            <option value="{!! $cat->category_id !!}">{!! $cat->category_name !!}</option>
            @endforeach
            </select>   
            
        </div>

        <div>
            <a href="change_image.php"> Change Image </a>
        </div>

        <input type="submit" name="upd" value="UPDATE">
        <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>

    </div>

@stop
