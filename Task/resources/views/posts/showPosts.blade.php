<!DOCTYPE html>
<html lang="en">
<head>
  <title>Posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .command{
        width:100%;
        height:80px;
        overflow: auto;
        line-height:16px;
    }
  </style>
</head>
<body class="bg-info">

@foreach($item as $items)
<div class="container mt-3">
    <h2>{{$items->title}}</h2>
    <div class="card" style="width:400px">
        <img class="card-img-top" src="{{asset('storage/file/'.$items->image)}}" alt="{{$items->title}}" style="width:100%" height="280px">
        <div class="card-body">
        <p class="card-text">{{$items->content}}</p>
        <form action="addcommand/{{$items->id}}" method="post">
            @csrf
            <textarea name="command" id="comm" cols="30" rows="1"></textarea><br>
            <input type="submit" value="comment">
            
        </form>
    </div>
        <div class="command container" >
            @foreach($command as $com)
                @if($items->id == $com->post_id)
                    @foreach($user as $users)
                        @if($com->user_id == $users->id)
                          <a href="findpost/{{$users->id}}">  <span class=>{{$users->name}} =></span></a>
                        @endif
                    @endforeach
                    <span class="ms-3">{{$com->command}}</span> <br>
                 @endif
            @endforeach
        </div>
        </div>
    @endforeach
    
    

</body>
</html>
