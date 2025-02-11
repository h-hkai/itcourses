<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laravel File Upload</title>
</head>
<body>
    <div class="upload">
        <form action="{{route('voiceUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File in Laravel</h3>
          <div class="custom-file">
            {{csrf_field()}}
            <label for="chooseFile">Select file</label><input type="file" name="file" id="chooseFile">
            <br>
            <label for="num">num: </label><input type="text" name="num">
            <br>
            <label for="lrc_path">lrcPath: </label><input type="text" name="lrc_path">
            <br>
            <label for="album">album: </label><input type="text" name="album">
          </div>
          <button type="submit" name="submit">
            Upload Files
          </button>
        </form>
    </div>
    <div>
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <strong>{{ $message }}</strong>
          <strong>{{ Session::get('mp3Path')}}</strong>
        </div>
      @endif
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
</body>
</html>