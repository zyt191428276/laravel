<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/flash" method="post">
    <input type="text" name="username" value="{{old('username')}}"> <br>
    <input type="text" name="password" value="{{old('password')}}"> <br>
    <input type="text" name="age" value="{{old('age')}}"> <br>
    {{csrf_field()}}
    <button type="submit">点击提交</button>
</form>
</body>
</html>