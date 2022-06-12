<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;
class PosController extends Controller
{

    public function getproduct($id){
        $product = DB::table('products')
   		->where('category_id',$id)
   		->get();
   		return response()->json($product);

    }
    public function OrderDone(Request $request){

   	 $validatedData = $request->validate([
      'patient_id' => 'required',
      'payby' => 'required',
      'Admin_id' => 'required',
      'id'=> 'required',
   	 ]);

      $data = array();
      $data['Admin_id'] = $request->Admin_id;
      $data['Employee_id'] = $request->id;
      $data['patient_id'] = $request->patient_id;
      $data['qty'] = $request->qty;
      $data['total'] = $request->total;
      $data['pay'] = $request->pay;
      $data['due'] = $request->due;
      $data['payby'] = $request->payby;
      $data['order_date'] = date('d/m/Y');
      $data['order_month'] = date('F');
      $data['order_year'] = date('Y');
      $order_id = DB::table('orders')->insertGetId($data);

      $contents = DB::table('testcarts')->get();

     $odata = array();
     foreach ($contents as $content) {
     $odata['Admin_id'] = $request->Admin_id;
     $odata['Employee_id'] = $request->id;
     $odata['patient_id'] =$request->patient_id;
     $odata['order_id'] = $order_id;
     $odata['test_name'] = $content->test_name;
     $odata['test_price'] = $content->test_rate;
    //  $odata['reporting_date'] = $content->test_rate;
    //  $odata['specimen'] = $content->test_rate;
    //  $odata['collect'] = $content->test_rate;
     DB::table('orders_details')->insert($odata);
      //DB::table('products')->where('id',$content->pro_id)->update(['product_quantity' => DB::raw('product_quantity -' .$content->pro_quantity)]);

     }
    DB::table('testcarts')->delete();
    DB::table('patientcarts')->delete();
    return response('Done');

   }


  public function SearchOrderDate(Request $request){
    $orderdate = $request->date;
    $Admin_id = $request->Admin_id;
    $newdate = new DateTime($orderdate);
    $done = $newdate->format('d/m/Y');

    $order = DB::table('orders')->where('orders.Admin_id' , $Admin_id)
        ->join('patients','orders.patient_id','patients.id')
        ->select('patients.name','orders.*')
        ->where('orders.order_date',$done)
        ->get();

    return response()->json($order);

  }



   public function TodaySell($id){
     $date = date('d/m/Y');
     $sell = DB::table('orders')->where('orders.Admin_id' , $id)->where('orders.order_date',$date)->sum('pay');
     return response()->json($sell);

   }

   public function TodayOrder($id){
    $date = date('d/m/Y');
    $sell = DB::table('orders')->where('orders.Admin_id' , $id)->where('orders.order_date',$date)->get();
    $wordCount = count($sell);
    return  response()->json($wordCount);

  }

   public function TodayIncome(){
     $date = date('d/m/Y');
     $income = DB::table('orders_details')->join('orders' ,'orders_details.order_id' , 'orders.id')->where('order_date',$date)
     ->join('products','orders_details.product_id','products.id')->sum('products.buying_price');
     return response()->json($income);



    //  $income = DB::table('orders')->where('order_date',$date)->sum('pay');
    //  return response()->json($income);
   }

    public function TodayDue($id){
     $date = date('d/m/Y');
     $todaydue =DB::table('orders')->where('orders.Admin_id' , $id)->where('orders.order_date',$date)->sum('due');
     return response()->json($todaydue);
   }


   public function TodayExpense($id){
    $date = date('d/m/Y');
     $expense = DB::table('expenses')->where('Admin_id' , $id)->orwhere('expense_date',$date)->sum('amount');
     return response()->json($expense);
   }

 public function Stockout(){

  $product = DB::table('products')->where('product_quantity','<','1')->get();
  return response()->json($product);

 }

 public function Redirect(){

    return redirect()->route('roler');

   }



}
