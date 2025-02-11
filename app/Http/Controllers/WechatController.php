<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WechatController extends Controller
{
  public function getDatas(){
    $datas = DB::table('voices')->where('album', '=', '20240727')->orderBy('num', 'asc')->get();
    return $datas;
  }
}
