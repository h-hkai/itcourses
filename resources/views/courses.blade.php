@extends('layouts.app')

@section('content')

<div class="row" style="margin: 60px;">
  @foreach($courses as $course)
  <div class="col-sm-3 col-md-3 col-lg-3" style="text-align: center;">
    <a href="{{route('courses.show', ['id' => $course->id])}}">
      <img src={{$course->img}} width=80%>
    </a>
    <a href="{{route('courses.show', ['id' => $course->id])}}">
      <p>{{$course->title}}</p> 
    </a>
  </div>
  @endforeach
</div>

<div>
  {{$courses->appends(request()->query())->links()}}
</div>

<b><font color="#1B75D0">学习次数：{{$count}}</font></b>

@endsection