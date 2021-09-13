<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    function list($id=null)
    {
        return $id?Customer::find($id):Customer::all();
    }

    function add(Request $req)
    {
        $customer = new Customer;
        $customer->name_customer=$req->name_customer;
        $customer->phone_customer=$req->phone_customer;
        $customer->address_customer=$req->address_customer;
        $customer->email_customer=$req->email_customer;
        $customer->city_customer=$req->city_customer;

        $result = $customer->save();
        if( $result)
        {
            return ["Result"=>"Data has been saved"];
        }else
        {
            return ["Result"=>"Error"];
        }  
    }

    function update(Request $req)
    {
        $customer = Customer::find($req->id_customer);
        $customer->name_customer=$req->name_customer;
        $customer->phone_customer=$req->phone_customer;
        $customer->address_customer=$req->address_customer;
        $customer->email_customer=$req->email_customer;
        $customer->city_customer=$req->city_customer;
        $result = $customer->save();
        if( $result)
        {
            return ["Result"=>"Data has been updated"];
        }else
        {
            return ["Result"=>"Error"];
        }  
        
    }

    function search($name)
    {
        return Customer::where("name_customer","like","%".$name."%")->get();
    }

    function delete($id)
    {
        $customer = Customer::find($id);
        $result=$customer->delete();
        if( $result)
        {
            return ["Result"=>"Data has been deleted"];
        }else
        {
            return ["Result"=>"Error"];
        }  
    }
}
