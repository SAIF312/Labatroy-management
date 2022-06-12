<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon;

class OrderController extends Controller
{
    public function TodayOrder($id){

     $data = date('d/m/Y');
     $order = DB::table('orders')->where('orders.Admin_id' , $id)->where('orders.order_date',$data)
        ->join('patients','orders.patient_id','patients.id')
        ->select('patients.name','orders.*')
        ->orderBy('orders.id','DESC')->get()->pagination(4);
        return response()->json($order);
    }

     public function all($id){
    $order = DB::table('orders')->where('orders.Admin_id'  , $id)
    ->join('patients','orders.patient_id','patients.id')
    ->select('patients.name','orders.id','orders.*')
    ->orderBy('orders.id','DESC')->get();
    return response()->json($order);

}



   public function OrderDetails($id){
   	//return response()->json($id);
   	   $order = DB::table('orders')
   	  ->join('patients','orders.patient_id','patients.id')
   	  ->where('orders.id',$id)
   	  ->select('patients.name','patients.phone','patients.email','patients.gender','patients.age','patients.cnic', 'orders.*')
   	  ->first();
   	  return response()->json($order);

   }


   public function OrderDetailsAll($id){

   		$details = DB::table('orders_details')
   			->join('patients','orders_details.patient_id','patients.id')
   			->where('orders_details.order_id',$id)
   			->select('patients.name','orders_details.*')
   			->get();
   			return response()->json($details);


   }



}
