@extends('layouts.master')
@section('content')

<div class="wrapper">
<table id="tab">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Category ID</th>
            <th>Product Name</th>
            <th>Author Name</th>
            <th>Image </th>
            <th>Price </th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
           @foreach ($prod as $prod)
        <tr>
        <td>{!! $prod->product_id !!}</td>
        <td>{!! $prod->category_id !!}</td>
        <td>{!! $prod->product_name !!}</td>
        <td>{!! $prod->author_name !!} </td>
        <td>{!! $prod->image !!}</td>
        <td>{!! $prod->price !!}</td>
        <td> <a href="/editproduct/{!! $prod->product_id !!}/">edit</a></td>
        <td> <a href="/deleteproduct/{!! $prod->product_id !!}/">delete</a></td>
        </tr>
           @endforeach            
    </tbody>
</table>
<input type="hidden" value="{{ Session::token() }}" name="_token">
</div>
@endsection