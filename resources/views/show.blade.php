@extends('layouts.app')

@section('content')

<div class="row" style="margin: 60px;">
  <div>
    <h1>{{$course->title}}</h1> 

    <div class="image" style="text-align: center;">
      <img src={{$course->img}} width=60%>
    </div>
    <br>
    <b>简介：</b>
    @foreach($course->description as $p)
    <p>{{$p}}</p>
    @endforeach
    <b>更新日期：</b>
    <p>{{$course->update_time}}</p>
    <b>标签：</b>
    <p>{{$course->tags}}</p>
    <b>下载次数：</b>
    <p>{{$course->count}}</p>
    @if(Auth::check())
    <b>下载链接：</b>
      @if(Auth::user()->daily_count < 3 || Auth::user()->level > 0)
        @if(!empty($course->download_links))
        <br>
        <button type="button" class="redirectToUrl" data-redirect-url="{{substr($course->download_links, 4, -4)}}">{{substr($course->download_names, 2, -2)}}</button>
        @if(!empty($course->downcodes))
        提取码：{{$course->downcodes}}
        @endif
        <br>
        @endif
      @else
      <p><font color="red">今日下载次数已用完，请明天再来！</font></p>
      @endif
    @else
    <p><font color="red">登陆后获取下载链接！</font></p>
    @endif

  </div>
</div>

<script src="../js/jquery-3.7.1.min.js"></script>
<script>
  $(document).on('click', '.redirectToUrl', function() {
    $.get("{{route('courses.count', ['id' => $course->id])}}");
    let getRedirectUrl = $(this).attr('data-redirect-url');
    window.open(getRedirectUrl, "_blank");
  });
</script>
@endsection