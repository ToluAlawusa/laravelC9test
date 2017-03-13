<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model 
{
  # eloquent needs u to define ur preferred table name and primary key for overide
  protected $table = 'customers';
  protected $primaryKey = 'customer_id';

  public static function getCustomers() {
        $customers = Customer::all();
        return $customers;
  }

  public static function getCustomersById($id) {
  		$customer = Customer::where("customer_id", '=', $id)->first();
  		return $customer;
  }

}