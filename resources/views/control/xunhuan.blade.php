<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @for($i = 0; $i < 100; $i++)
        {{$i}}
    @endfor
    <hr>
    <ul>
        @foreach($users as $k => $v)
            <li>
                姓名：{{$v['username']}} <br>
                年龄：{{$v['age']}} <br>
            </li>
        @endforeach

    </ul>

</body>
</html>