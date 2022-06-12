<?php
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
   // Route::post('forgot', 'AuthController@forgot');
    Route::post('Signup', 'AuthController@Signup');
    Route::post('Create', 'AuthController@Create');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
});
Route::apiResource('/employee' , 'Api\EmployeeController');
Route::apiResource('/patient' , 'Api\Patients');
Route::apiResource('/test' , 'Api\Testcontroller');
Route::apiResource('/specimen' , 'Api\SpecimenController');


Route::apiResource('/supplier' , 'Api\SupplierController');

Route::apiResource('/category' , 'Api\CategoryController');

Route::apiResource('/product' , 'Api\ProductController');

Route::apiResource('/expense' , 'Api\ExpensesController');

Route::apiResource('/salary' , 'Api\SalaryController');

Route::apiResource('/customer', 'Api\CustomerController');

Route::Post('/salary/paid/{id}', 'Api\SalaryController@Paid');
Route::Get('/salary', 'Api\SalaryController@AllSalary');

Route::Get('/salary/view/{id}', 'Api\SalaryController@ViewSalary');
Route::Get('/edit/salary/{id}', 'Api\SalaryController@EditSalary');
Route::Post('/salary/update/{id}', 'Api\SalaryController@SalaryUpdate');



Route::Post('/stock/update/{id}', 'Api\ProductController@StockUpdate');
Route::Get('/get/subproduct/{id}', 'Api\PosController@getproduct');


// Add to cart Route
Route::Get('/addToCart/{id}', 'Api\CartController@AddToCart');
Route::Get('/addToCartPatient/{id}', 'Api\CartController@AddToPatient');
Route::Get('/addToCartemployee/{id}{admin_id}', 'Api\CartController@AddToEmployee');
Route::Get('/addToCartTest/{id}', 'Api\CartController@AddToTest');
Route::Get('/cart/product', 'Api\CartController@CartProduct');
Route::Get('/cart/test', 'Api\CartController@CartTest');
Route::Get('/cart/patient', 'Api\CartController@CartPatient');
Route::Get('/cart/employee', 'Api\CartController@CartEmployee');

Route::Get('/remove/cart/{id}', 'Api\CartController@removeCart');
Route::Get('/remove/employeecart/{id}', 'Api\CartController@removeemployeeCart');

Route::Get('/increment/{id}', 'Api\CartController@increment');
Route::Get('/decrement/{id}', 'Api\CartController@decrement');

// Vat Route
Route::Get('/vats', 'Api\CartController@Vats');


// Order Route
Route::Post('/orderdone', 'Api\PosController@OrderDone');

Route::Get('/orders/{id}', 'Api\OrderController@TodayOrder');
Route::Get('/orders/all/{id}', 'Api\OrderController@all');
Route::Get('/order/details/{id}', 'Api\OrderController@OrderDetails');
Route::Get('/order/orderdetails/{id}', 'Api\OrderController@OrderDetailsAll');

// User accounts

 Route::Get('/useraccount/{id}' , 'Api\useraccountcontroller@index');
 Route::delete('/useraccount/{id}' , 'Api\useraccountcontroller@destroy');


// fetching filter data only
Route::Get('/data/employee/{id}' , 'Api\FilterController@index');
Route::Get('/data/expense/{id}' , 'Api\FilterController@Expenseindex');
Route::Get('/data/test/{id}' , 'Api\FilterController@Testindex');
Route::Get('/data/patient/{id}' , 'Api\FilterController@Patientindex');
Route::Get('/data/salary/{id}' , 'Api\FilterController@Salaryindex');
Route::Get('/data/supplier/{id}' , 'Api\FilterController@Supplierindex');
Route::Get('/data/Category/{id}' , 'Api\FilterController@Categoryindex');
Route::Get('/data/specimen/{id}' , 'Api\FilterController@Specimenindex');
Route::Get('/data/product/{id}' , 'Api\FilterController@Productindex');
Route::Get('/data/stock/{id}' , 'Api\FilterController@Stockindex');
Route::Get('/data/employees/{id}' , 'Api\FilterController@Employeeindex');
Route::Get('/data/pendingemployees/{id}' , 'Api\FilterController@pendingemployeesindex');








Route::Post('/search/order', 'Api\PosController@SearchOrderDate');


// Admin Dashboard Route

Route::Get('/today/order/{id}', 'Api\PosController@TodayOrder');
Route::Get('/today/sell/{id}', 'Api\PosController@TodaySell');
Route::Get('/today/due/{id}', 'Api\PosController@TodayDue');
Route::Get('/today/expense/{id}', 'Api\PosController@TodayExpense');
Route::Get('/today/stockout', 'Api\PosController@Stockout');



Route::Get('/redirect', 'Api\PosController@Redirect');
