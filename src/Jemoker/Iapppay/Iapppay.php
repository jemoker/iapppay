<?php
namespace Jemoker\Iapppay;

class Iapppay {

	public $config;

	function __construct($config){
		$this->config = $config;
	}

	function setParams($config){
		$this->config = array_merge($this->config, $config);
	}

	public function pay(){
		$orderReq['appid'] = $this->config['appid'];
		$orderReq['waresid'] = $this->config['goods_no'];
		$orderReq['waresname'] = $this->config['subject'];
		$orderReq['cporderid'] = $this->config['out_trade_no'];
		$orderReq['price'] = floatval($this->config['total_fee']);   //单位：元
		$orderReq['currency'] = 'RMB';
		$orderReq['appuserid'] = strval($this->config['uid']);
		//组装请求报文  对数据签名
		$iappPayBase = new Base();
		$reqData = $iappPayBase->composeReq($orderReq, $this->config['appkey']);

		$respData = $iappPayBase->request_by_curl($this->config['order_url'], $reqData, 'order test');
		//验签数据并且解析返回报文
		if(!$iappPayBase->parseResp($respData, $this->config['platpkey'], $respJson)) {
			return '';
		}else{
			//     下单成功之后获取 transid
			$orderReq = array(
				'tid' => $respJson->transid,
				'app' => $this->config['appid'],
				'url_r' => $this->config['call_back_url'],
				'url_h' => $this->config['call_back_url'],
				'ptype' => 403
			);

			$reqData = $iappPayBase->composeReqv2($orderReq, $this->config['appkey']);
			return $this->config['h5_url'].$reqData;
		}
	}

	public function validate($reqData){
		$transdata = $reqData['transdata'];
		if(stripos("%22",$transdata)){
			$reqData = array_map('urldecode',$reqData);
		}
		$respData = 'transdata='.$reqData['transdata'].'&sign='.$reqData['sign'].'&signtype='.$reqData['signtype'];
		$iappPayBase = new Base();
		if(!$iappPayBase->parseResp($respData, $this->config['platpkey'], $respJson)) {
			//验签失败
			return false;
		}else{
			//验签成功
			return true;
		}
	}
}