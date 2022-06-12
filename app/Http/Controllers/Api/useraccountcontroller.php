<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class useraccountcontroller extends Controller
{
    public function index($id)
    {
        $user = DB::table('users')->where('Admin_id' , $id)->get();
        return response()->json($user);
    }


    public function destroy($id)
    {
         DB::table('users')->where('id',$id)->delete();
        }
}
