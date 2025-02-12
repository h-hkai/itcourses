<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CoursesController extends Controller
{
    // Show a list of all of courses 
    public function index(): View
    {
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->count;

      $courses = DB::table('courses')->orderBy('update_time', 'desc')->paginate(20);

      return view('courses', [
        'courses' => $courses, 
        'count' => $count]);
    }

    public function history(): View
    {
      return view('history');
    }

    public function count($id)
    {
      // 更新总的学习次数
      $query = DB::table('persistence')->where('id', 1)->first();
      $count = $query->count;     
      DB::table('persistence')->where('id', 1)->update(['count' => $count+1]);

      // 更新课程学习次数
      $query = DB::table('courses')->where('id', $id)->first();
      $count = $query->count;     
      DB::table('courses')->where('id', $id)->update(['count' => $count+1]);

      // 更新用户学习次数
      $user = Auth::user();
      echo $user;
      $query = DB::table('users')->where('id', $user->id)->first();
      $count = $query->count;     
      DB::table('users')->where('id', $user->id)->update(['count' => $count+1]);
    }

    public function show($id): View
    {
      $course = DB::table('courses')->where('id', $id)->first();
      $course->description = explode(',', $course->description);
      return view('show', ['course' => $course]);
    }

}
