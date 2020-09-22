<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>流程控制</title>
</head>
<body>
    给你买一个
    @if($total >= 90 && $total <= 100)
        游戏机
    @elseif($total >= 85 && $total < 90)
        望远镜
    @else
        锤子
    @endif

    <hr>
    性别:
    <input type="radio" name="sex" value="1" @if($sex==1) checked="checked" @endif>男
    <input type="radio" name="sex" value="0" @if($sex==0) checked="checked" @endif>女
</body>
</html>