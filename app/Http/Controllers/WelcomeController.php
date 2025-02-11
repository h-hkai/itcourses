<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    // Show a list of all of courses 
    public function index(): View
    {
      // $query = DB::table('persistence')->where('id', 1)->first();
      $count = 0;

      $courses = DB::table('courses')->orderBy('update_time', 'desc')->paginate(15);

      return view('welcome', [
        'courses' => $courses, 
        'count' => $count]);
    }
}
