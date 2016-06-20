<?php
return [

	//爱贝商户后台接入url
	'iapppay_cp_url' => 'http://ipay.iapppay.com:9999',

	//下单接口 url
	'token_check_url' => 'http://ipay.iapppay.com:9999/openid/openidcheck',

	//
	'order_url' => 'http://ipay.iapppay.com:9999/payapi/order',

	//支付结果查询接口 url
	'query_result_url' => 'http://ipay.iapppay.com:9999/payapi/queryresult',

	//契约查询接口url
	'querysubs_url' => 'http://ipay.iapppay.com:9999/payapi/subsquery',

	//契约鉴权接口Url
	'contract_authentication_url' => 'http://ipay.iapppay.com:9999/payapi/subsauth',

	//取消契约接口Url
	'subcancel' => 'http://ipay.iapppay.com:9999/payapi/subcancel',

	//H5和PC跳转版支付接口Url
	'h5_url' => 'https://web.iapppay.com/h5/dpay?',

	//应用编号
	'appid' => "XXX",

	//应用私钥
	'appkey' => "XXX",

	//平台公钥
	'platpkey' => "XXX",

	// 商品编号
	'goods_no' => 1
];

