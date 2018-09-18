<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2017060507424637",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEA1dF0/7sJxJjerePFKXVsdIk6OHGD8YxAhe4G94nPUmLr9os9j3bxD4mnqk/LyMWjhBGBHqoN0QhDyRzDSKZS2xWMbmXewHmegLO7T3vHtKdvo9EBtYT4mQaEjJchYUPiQ1ojYXWcm+myORc0SguuF1VH19oovwZGmJ2pXNeD0siQK6UrQ71L2xvef73Lex424jgd8LbKuXZPXb9CtTyzdZWuaOwp237CyCFIMutS6l+ZckrX456jqutU8Ly1cwMwbo75UB0thgvEXcJPFcwYSK00aP3UtxpexOwAQA/Ui8tMhOgWGCpDSVbtLm3lp/+CvSTHoqOZD65MwRPEJjJT5wIDAQABAoIBAFLspgycNICbrRkRkiCvGr3jjsHfPIXMmCWZF/ie6NoR5WO7wsdGIN2ezHjf86/M/sq0ozgKSct9AhUYY6BkaRPwuoMCXS6WvGM70XRVFDG7EjAdWiVVCbkHbxa7ckWvtyvZ5IjivTc2nllH546kEwOXnoJXaKAVRgHge5O3PbfcPUrpV0YBCMwtuYLLY+K45C8J3dfNTNqT4DQc30etSO0LhQTIPhPv6Hr/o8s0QNC3JAKyVFklCQujWOkLUuCTQixa2X/HdhfEz4KXdB2jUflfUNJcFZN65zWpzjS+2Bd9UDfpjC1Fam4eabRcha6+Umbv6F54YskkAkbqO8BfuPECgYEA+DaBDV6C3+pS/KFuM/Kee+czkJy2dpeVYp2wBgQqcVJZobbo3WhvwTUFqLOdMoj3SWtHRtXOoWjz3PoFxLgAKr8KxvxOAcLzS1jWUE55MQ49B5fWMQM6MnO9X5foSwubRPJwt867uM11Yzak1lovLTdnzAkk7Ko+5ADFjUZ47QkCgYEA3Ia3Isl05D+aV7xb9Bf/OQMde0CSKiIiFTB+E1IJTFt+BUJaIXhtWKsMPsRy8H+fuK/q/ZCdHPOnJiKGg9VEpNEoGYYWzeYYxacsC8fX24cX3zSYvRQRigLfSBu9fZzHJx2IYQc7jzuFw8DUjS5edWXOjixwC9p0KLGtA+8HZW8CgYBPlYI5XCVQUBx9nfDsvQzto0rYQjcKvT2Lmg23UByfqwzMGg599x9l7m87ESQE8P+AzeHTp3gSLsmJ/6xbz7dV/V0iQgFs9Sn27awBobef7/XHenqVyngddxiwDs/PSBBnweg8Nw/fiBjsT7f4doAL2mjwdboeG9QAXPL6gi8BqQKBgD/uEfNUwb1VrvHWWjX2KvglLgvIGVd7k7Pe3f3N34IyV+NAbA6d8d0toRwlKUkNRols/kvJ+7Ij9IX6plJbpk29kMltdPj1xqKuJve3VJ2AmWwMvGa8BaWj1YT6/cEHjTiKuDmgtiR81fd81GGlWp7gB7Rxr33QM7KEZ6rnRZajAoGAUgr0ACvHc9lZGeKK1fAcV29+3XZcllMN1OArwuk+e30Xdt2TdGRSmHjtv6uk+CWpJ9vcE6qgWfyvK0pvf+wdoaxZPCEinsiKdGrSBC/jxDnnUbaPNZ2Y3Lc8QH87ICrqMcaZWe9Jo00z+87vfRJPhk5nR7urSw35+JvBzJuiSWU=",
		
		//异步通知地址
		'notify_url' => "https://www.schoolingandhoming.com/Mobile_Alipay/notify_url",
		
		//同步跳转
		'return_url' => "https://www.schoolingandhoming.com/Mobile_Alipay/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAp4tVDUEzWEf6nXwxXp5iV3RPpe60bmHTnfdDd00rZlq+0z6TWiJQjmglzqOXETdvLbrAajNiyizNaeR/oUj6L/WUhmbAYLs+v0LJhLDF1Oeuo1P5XuxFEx1strAsYvuTuw+WFXN7/MHvZtUHItOZDB8lk0dbzCKnerovREur8tRUbrWzBS4xky5/MfiBl3kXRyibr3QB25LXA9gU67qtOEgaICvy5gLOx6Arx3kr5MuK1aEkJvwr5f/eYzFBZMTqgBhvtLQL7Quuqj+Avr1WZQug7IDFZWh5YRaWkw0h0UbiNBlcG7QR6RIg2+8OrgnzRpeSNrV+Cj7m4wzNvkLtkQIDAQAB",
		
	
);