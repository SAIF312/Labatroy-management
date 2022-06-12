<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
    	$product = DB::table('products')->where('id',$id)->first();

    	$check = DB::table('pos')->where('pro_id',$id)->first();

    	if ($check) {
    	DB::table('pos')->where('pro_id',$id)->increment('pro_quantity');

       $product = DB::table('pos')->where('pro_id',$id)->first();
  	   $subtotal = $product->pro_quantity * $product->product_price;
  	   DB::table('pos')->where('pro_id',$id)->update(['sub_total'=> $subtotal]);

    	}else{
    	$data = array();
    	$data['pro_id'] = $id;
    	$data['pro_name'] = $product->product_name;
    	$data['pro_quantity'] = 1;
    	$data['product_price'] = $product->selling_price;
    	$data['sub_total'] = $product->selling_price;

    	DB::table('pos')->insert($data);
    	}


    }


	public function AddToPatient(Request $request, $id){
		$get = DB::table('patientcarts')->first();
		 if($get){

			return "patient already exist";

		}
		else{
			$patient = DB::table('patients')->where('id',$id)->first();
			$data = array();
			$data['pat_id'] = $id;
			$data['pat_name'] = $patient->name;
			DB::table('patientcarts')->insert($data);
		}

    }

    public function AddToEmployee(Request $request, $id, $admin_id){
		$get = DB::table('cartemployees')->first();
		 if($get){

			return "employee already exist";

		}
		else{
			$employee = DB::table('employees')->where('id',$id)->first();
			$data = array();
            $data['Admin_id'] = $admin_id;
			$data['employee_id'] = $id;
			$data['name'] = $employee->name;
            $data['email'] = $employee->email;
			DB::table('cartemployees')->insert($data);
        }

    }



	public function AddToTest(Request $request, $id){
    	$test = DB::table('tests')->where('id',$id)->first();
    	$data = array();
    	$data['test_name'] = $test->Testname;
    	$data['test_rate'] = $test->Testrate;
    	DB::table('testcarts')->insert($data);
    }

  public function CartProduct(){
   $cart = DB::table('pos')->get();
  	return response()->json($cart);
  }


  public function CartPatient(){
	$cart = DB::table('patientcarts')->get();
	   return response()->json($cart);
   }

   public function CartEmployee(){
	$cart = DB::table('cartemployees')->get();
	   return response()->json($cart);
   }

   public function CartTest(){
	$cart = DB::table('testcarts')->get();
	   return response()->json($cart);
   }



 public function removeCart($id){
 	DB::table('testcarts')->where('id',$id)->delete();
 	return response('Done');

 }

 public function removeemployeeCart($id){
    DB::table('cartemployees')->where('id',$id)->delete();
    return response('Done');

}

  public function increment($id){
  	$quantity = DB::table('pos')->where('id',$id)->increment('pro_quantity');

  	$product = DB::table('pos')->where('id',$id)->first();
  	$subtotal = $product->pro_quantity * $product->product_price;
  	DB::table('pos')->where('id',$id)->update(['sub_total'=> $subtotal]);
  	return response('Done');
  }


  public function decrement($id){
  	$quantity = DB::table('pos')->where('id',$id)->decrement('pro_quantity');

  	$product = DB::table('pos')->where('id',$id)->first();
  	$subtotal = $product->pro_quantity * $product->product_price;
  	DB::table('pos')->where('id',$id)->update(['sub_total'=> $subtotal]);
  	return response('Done');
  }


  public function Vats(){
  	$vat = 0;
  	return response()->json($vat);
  }


}
