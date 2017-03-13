@extends('layouts.cus')
@section('browsertitle')customercart @stop
@section('content')


	<div class="main">
    <table class="cart-table">
      <thead>
        <tr>
          <th><h3>Item</h3></th>
          <th><h3>Price</h3></th>
          <th><h3>Quantity</h3></th>
          <th><h3>Total</h3></th>
          <th><h3>Update</h3></th>
          <th><h3>Remove</h3></th>
        </tr>
      </thead>
      <tbody>
       @foreach ($cartlist as $cartlist)
        <tr>

          <td><a href="/customerbookpreview/{!! $cartlist->product_id !!}/"><div class="book-cover b1" style="background: url('{{ asset('uploads/' . $cartlist->image )}}') 
           no-repeat center; background-size: cover; width: 81px;
           height: 100px;"></div></a></td>
          <td><p class="book-price">{!! $cartlist->price !!}</p></td>
          <td><p class="quantity">{!! $cartlist->quantity !!}</p></td>
          <td><p class="total">{!! $cartlist->quantity * $cartlist->price !!}</p></td>
          <td>
            <form class="update" action="/customerupdatecart/{!! $id !!}/" method="POST">
            <input type="number" name="quant" class="text-field qty">
            <input type="hidden" value="{!!$cartlist->cart_id!!}" name="hid">
            <input type="submit" name="cquan" class="def-button change-qty" value="Change Qty">
            <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
          </td>
          <td>
            <form action="/customerdeletecart/{!! $id !!}/" method="POST">
            <input type="hidden" value="{!!$cartlist->cart_id!!}" name="delhid">
            <a href="/customerdeletecart/{!! $cartlist->product_id !!}/"><button class="def-button remove-item">Remove Item</button></a>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
          </td>
             
        </tr>
       @endforeach
      </tbody>
    </table>
    <div class="cart-table-actions" style="margin: 54px auto 0 auto;">
      <button class="def-button previous" style="float: left; margin-right: 24px;">previous</button>
      <div class="index" style="float: left;">
        <a href="#" style="float: left;"><p>1</p></a>
        <a href="#" style="float: left; margin: 0 36px;"><p>2</p></a>
        <a href="#" style="float: left;"><p>3</p></a>
      </div>
      <button class="def-button next" style="float: left; margin-right: 24px">next</button>
      
      <a href="/customercheckout/{!! Session::get('customer_id')!!}/" style="display: block; margin: 56px auto 0 auto;"><button class="def-button checkout">
      Checkout</button></a>

    </div>
  </div>


@endsection