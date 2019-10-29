<?php
require(dirname(__FILE__) . "/../../../../framework/bootstrap.inc.php");
require(IA_ROOT . "/addons/ewei_shopv2/defines.php");
require(IA_ROOT . "/addons/ewei_shopv2/core/inc/functions.php");
//require(IA_ROOT."/addons/ewei_shopv2/payment/rmpay/tests/index.php");
//require(IA_ROOT . "/addons/ewei_shopv2/core/inc/plugin_model.php");
//require(IA_ROOT . "/addons/ewei_shopv2/core/inc/com_model.php");
//$input = file_get_contents("php://input");


file_put_contents(dirname(__FILE__).'/url5.txt',json_encode($_GET));
$response = $rm->payment->findByOrderId($_GET['transactionId']);

new EweiShopRmPay($response);

exit( "fail" );
class EweiShopRmPay
{
	public $get = NULL;
	public function __construct($get) 
	{
		global $_W;
        $this->order($get);
	}
	public function order($get)
	{
		global $_W;
        $get = json_encode($get);
        $get = json_decode($get,true);

		$ordersn = $get['order']['additionalData'];
        $tid = $get['order']['additionalData'];
		$count_ordersn = m("order")->countOrdersn($tid);

		$isborrow = 0;
		$borrowopenid = "";
		if( strpos($tid, "_borrow") !== false ) 
		{
			$tid = str_replace("_borrow", "", $tid);
			$isborrow = 1;
			$borrowopenid = $this->get["openid"];
		}
		if( strpos($tid, "_B") !== false ) 
		{
			$tid = str_replace("_B", "", $tid);
			$isborrow = 1;
			$borrowopenid = $this->get["openid"];
		}

		//RM支付
		$paytype = 99;
		$tid = substr($tid, 0, 22);


        $order = pdo_fetch("SELECT * FROM " . tablename("ewei_shop_order") . " WHERE ordersn = :ordersn", array( ":ordersn" => $tid));

        $sql = "SELECT * FROM " . tablename("core_paylog") . " WHERE `module`=:module AND `tid`=:tid  limit 1";

		$params = array( );

		$params[":tid"] = $tid;

		$params[":module"] = "ewei_shopv2";

		$log = pdo_fetch($sql, $params);

        if( !empty($log) && $log["status"] == "0" && ($log["fee"] == ($get['order']['amount']/100)) )
		{
			$transaction_id = $get["transactionId"];
			if( $count_ordersn == 2 ) 
			{
				pdo_update("ewei_shop_order", array( "tradepaytype" => 21, "isborrow" => $isborrow, "borrowopenid" => $borrowopenid, "apppay" => ($this->isapp ? 1 : 0), "transid" => $transaction_id ), array( "ordersn_trade" => $log["tid"], "uniacid" => $log["uniacid"] ));
			}
			else 
			{
				pdo_update("ewei_shop_order", array( "paytype" => 99, "isborrow" => $isborrow, "borrowopenid" => $borrowopenid, "apppay" => ($this->isapp ? 1 : 0), "transid" => $transaction_id ), array( "ordersn" => $log["tid"], "uniacid" => $log["uniacid"] ));
			}

			$site = WeUtility::createModuleSite($log["module"]);
			m("order")->setOrderPayType($order["id"], $paytype);

            if( !is_error($site) )
			{
				$method = "payResult";
				if( method_exists($site, $method) ) 
				{
					$ret = array( );
					$ret["acid"] = $log["acid"];
					$ret["uniacid"] = $log["uniacid"];
					$ret["result"] = "success";
					$ret["type"] = $log["type"];
					$ret["from"] = "return";
					$ret["tid"] = $log["tid"];
					$ret["user"] = $log["openid"];
					$ret["fee"] = $log["fee"];
					$ret["tag"] = $log["tag"];
                    $result = $site->$method($ret);

                    if( $result )
					{
						$log["tag"] = iunserializer($log["tag"]);
						$log["tag"]["transaction_id"] = $get["transactionid"];
						$record = array( );
						$record["status"] = "1";
						$record["tag"] = iserializer($log["tag"]);

                        pdo_update("core_paylog", $record, array( "plid" => $log["plid"] ));
					}
				}
			}
            $url = 'http://'.$_SERVER['HTTP_HOST'] . '/index.php?i=1&c=entry&m=ewei_shopv2&do=mobile&r=order.pay.success&id='.$order["id"];

            header("location:" . $url);

		}
		else 
		{
			$this->fail();
		}
	}
}
?>