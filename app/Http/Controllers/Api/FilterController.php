<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FilterController extends Controller
{
    public function index($id)
    {
        $employee = DB::table('employees')->where('Admin_id' , $id)->get();
        return response()->json($employee);
    }

    public function Expenseindex($id)
    {
        $expense =DB::table('expenses')->where('Admin_id' , $id)->get();
        return response()->json($expense);
    }


    public function Testindex($id)
    {
        $test = DB::table('tests')->where('Admin_id' , $id)->get();
        return response()->json($test);
    }

    public function Specimenindex($id)
    {
        $specimen = DB::table('specimens')->where('Admin_id' , $id)->get();
        return response()->json($specimen);
    }

    public function Supplierindex($id)
    {
        $supplier = DB::table('suppliers')->where('Admin_id' , $id)->get();
        return response()->json($supplier);
    }
    public function Patientindex($id)
    {
        $patient = DB::table('patients')->where('Admin_id' , $id)->get();
        return response()->json($patient);
    }
    public function Salaryindex($id)
    {
        $salary = DB::table('salaries')->where('Admin_id' , $id)->get();
        return response()->json($salary);
    }

    public function Categoryindex($id)
    {
        $category = DB::table('categories')->where('Admin_id' , $id)->get();
        return response()->json($category);
    }

    public function Productindex($id)
    {
        $product = DB::table('products')->where('products.Admin_id' , $id)
        ->join('categories','products.category_id','categories.id')
        ->join('suppliers','products.supplier_id','suppliers.id')
        ->select('categories.CategoryName','suppliers.name','products.*')
        ->orderBy('products.id','DESC')
        ->get();
        return response()->json($product);
    }

    public function Stockindex($id)
    {
        $product = DB::table('products')->where('products.Admin_id' , $id)->where('products.product_quantity' , 0)
        ->join('categories','products.category_id','categories.id')
        ->join('suppliers','products.supplier_id','suppliers.id')
        ->select('categories.CategoryName','suppliers.name','products.*')
        ->orderBy('products.id','DESC')
        ->get();
        return response()->json($product);
    }

    public function Employeeindex($id)
    {
        $employee = DB::table('employees')->where('employees.Admin_id' , $id)->get();
        $wordCount = count($employee);
        return  response()->json($wordCount);
    }
    public function pendingemployeesindex($id)
    {
        $date = date('m');
        $employee = DB::table('salaries')->where('salaries.Admin_id' , $id)->where('salaries.salary_month')->get();
        $wordCount = count($employee);
        return  response()->json($wordCount);
    }
}
