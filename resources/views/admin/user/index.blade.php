<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <!--使用函数-->
    当前时间 <span style="color: red">{{time()}}</span><br>

    <!-- 使用默认值 -->
    欢迎你回来: {{$username or 'guest'}} <br>

    <!-- html 显示 {} 变为!!-->
    显示文本中的html文件:{!!$page!!}
    <!--原样输出-->
    {{{'<html> </html>'}}}

    @{{ 前面有@直接就解析了 }}
</body>
</html>