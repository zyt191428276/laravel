<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>delete请求</title>
</head>
<body>
<form action="/del" method="post">
    用户名: <input type="text" name="username"><br>
    密码: <input type="text" name="password"><br>
    <input type="hidden" name="_method" value="DELETE">
    <button>点击提交</button>
    {{csrf_field()}}
</form>
</body>
</html>