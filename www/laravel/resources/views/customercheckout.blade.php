@extends('layouts.cus')
@section('browsertitle')customerbookpreview @stop
@section('content')


	<div class="checkout-form">
      <form class="def-modal-form" action="/customercheckout/{!! $id !!}/" method="POST">
        <div class="total-cost">
          <h3> TOTAL : ${!! $totalPrice !!}</h3>
        </div>
        <div class="cancel-icon close-form"></div>
        <label for="login-form" class="header"><h3>Checkout</h3></label>
        <input type="text" class="text-field phone" name="phone" placeholder="Phone Number">
        <input type="text" class="text-field address" name="address" placeholder="Address">
        <input type="text" class="text-field post-code" name="postcode" placeholder="Post Code">
        <input type="submit" class="def-button checkout" value="Checkout">
        <input type="hidden" value="{{ Session::token() }}" name="_token">
      </form>
    </div>


@endsection