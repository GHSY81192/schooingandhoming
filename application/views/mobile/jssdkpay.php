<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Schoolingandhoming-微信支付</title>
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            callpay();
        });
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    if(res.err_msg == 'get_brand_wcpay_request:ok'){
                        ajaxstatus();

                        function ajaxstatus(){
                            $.post('/Wechat/checkOrder',{out_trade_no:"<?php echo $order_id?>"},function(data){
                                if(data.status === 888){
                                    location.href="/mobile/common/finishOrder";
                                }else{
                                    ajaxstatus();
                                }
                            },'json')
                        };



                    }
                    if(res.err_msg == 'get_brand_wcpay_request:cancel'){
                        window.history.back(-3);
                    }
                }
            );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
    </script>

</head>
<body>
</body>
</html>