<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderConTroller extends Controller
{
  public function showAllOrder(){
      $orders=DB::table('thanhtoan')->paginate(6);
      $lenOrder=DB::table('thanhtoan')->count();
      $lenStatus=DB::table('thanhtoan')->where('status',1)->count();
    return view('layouts.orders.order',compact('orders','lenOrder','lenStatus'));
  }
}
