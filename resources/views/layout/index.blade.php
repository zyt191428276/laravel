<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div style="height: 100px;background: #123456"></div>
    @section('content')
    <div style="height: 400px;background: #aefcdb"></div>
    @show
    @section('footer')
    <div style="height: 100px;background: #abcdef"></div>
    @show
    <!--获取可以用 yield('js')-->
    @section('js')
    @show
</body>
</html>