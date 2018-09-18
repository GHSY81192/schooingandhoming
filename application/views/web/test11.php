<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <style>
        #qian{width: 1000px;margin: 0 auto;text-align: center}
        #hou{width: 1000px;margin: 50px auto;text-align: center;background: #000;color: #fff}
    </style>
</head>
<body>
    <div id="qian">
        <h3>这是网站前端</h3>
        <p>起拍价：10000</p>
        <p>当前价格：<span id="p">900000</span></p>
        <p>出价次数：<span id="n">0</span>次</p>
    </div>

<div id="hou">
    <h3>这是网站后台</h3>
    <button id="btn">进价+1000</button>
    <button id="btn2">进价+5000</button>
</div>
</body>
<script>
    $('#btn').click(function(){



        var p = $('#p').html();
        var n = parseInt($('#n').html());
        var a = parseInt(p.split(",").join("")) + 1000;
        n++;

        var aaa = outputdollars(a.toString());
        $('#p').html(aaa);
        $('#n').html(n);
    })
    $('#btn2').click(function(){
        var p = $('#p').html();
        var n = parseInt($('#n').html());
        var a = parseInt(p.split(",").join("")) + 5000;
        n++;
        var aaa = outputdollars(a.toString());
        $('#p').html(aaa);

        $('#n').html(n);
    })

    function outputdollars(number) {
        if (number.length <= 3)
            return (number == '' ? '0' : number);
        else {
            var mod = number.length % 3;
            var output = (mod == 0 ? '' : (number.substring(0, mod)));
            for (i = 0; i < Math.floor(number.length / 3); i++) {
                if ((mod == 0) && (i == 0))
                    output += number.substring(mod + 3 * i, mod + 3 * i + 3);
                else
                    output += ',' + number.substring(mod + 3 * i, mod + 3 * i + 3);
            }
            return (output);
        }
    }


</script>
</html>