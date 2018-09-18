<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>微信支付</title>
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        setInterval("ajaxstatus()",3000);
            function ajaxstatus(){
                $.post('/Wechat/checkOrder',{out_trade_no:"<?php echo $order_id?>"},function(data){
                    if(data.status === 888){
                        location.href = '/web/finishOrder';
                    }
                },'json')
            };

    </script>
</head>
<body>
<div style="width: 100%;margin: 0 auto;text-align: center">
    <h1 style="margin-top: 200px">schoolingandhoming 微信扫码支付</h1>
    <img alt="微信扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url);?>" style="width:150px;height:150px;"/>

</div>




</body>
</html>