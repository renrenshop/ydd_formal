<?php

require EWEI_SHOPV2_PATH.'payment/rm/vendor/autoload.php';
// require __DIR__.'/src/helper/util.php';

use RevenueMonster\SDK\RevenueMonster;
use RevenueMonster\SDK\Exceptions\ApiException;
use RevenueMonster\SDK\Exceptions\ValidationException;
use RevenueMonster\SDK\Request\QRPay;
use RevenueMonster\SDK\Request\WebPayment;

class Rmpayment_EweiShopV2Model {

    protected $rm_object;
    protected $storeid;

    public function __construct()
    {
        global $_W;
        $sql = 'SELECT * FROM '.tablename('ewei_shop_payment').' WHERE uniacid=:uniacid AND id=:id';
        $rmpay_config = pdo_fetch($sql,array(':uniacid'=>$_W['uniacid'],':id'=>$_W['shopset']['pay']['weixin_id']));

        $config = unserialize($rmpay_config['rm']);

        $payment_bak = array(
            'clientId' => trim($config['clientId']),
            'clientSecret' => trim($config['clientSecret']),
            'privateKey' => trim($rmpay_config['private_key']),
            'version' => 'stable',
            'sandbox' => false,
        );
        $this->rm_object = new RevenueMonster($payment_bak);
        $this->storeid = $config['Merch_Id'];
    }

    public function get_order_info($id){
        global $_GPC,$_W;
        //查询订单信息
        $sql = 'select o.id,o.ordersn,o.price,g.title,g.subtitle,o.status from '.tablename('ewei_shop_order').' as o left join '.tablename('ewei_shop_order_goods').' as og on og.orderid=o.id left join '.tablename('ewei_shop_goods').' as g on g.id=og.goodsid where o.uniacid=:uniacid and o.id=:id';
        $order_info = pdo_fetch($sql,array(':id'=>$id,':uniacid'=>$_W['uniacid']));

        if(empty($order_info)){
            return array('error'=>0,'msg'=>'订单不存在');
        }

        if($order_info['status']>=1){
            return array('error'=>0,'msg'=>'订单已付款');
        }

        return $order_info;
    }

    public function WebPayment($orderid,$pay_type){
        global $_W,$_GPC;

        $order_info = $this->get_order_info($orderid);

        if(isset($order_info['error']) && $order_info['error']==0){
            return $order_info;
        }

        $title = substr($order_info['title'],0,32);

        $url = $_W['siteroot'] . 'app/index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_shopv2&do=mobile&r=order.pay.success&id='.$order_info['id'];

        try{
            $wp = new WebPayment();
            $wp->order->id = $order_info['id'];
            $wp->order->title = $title;
            $wp->order->currencyType = 'MYR';
            $wp->order->amount = (int)($order_info['price'] * 100);
            $wp->order->detail = $order_info['subtitle'];
            $wp->order->additionalData = $order_info['ordersn'];
            $wp->storeId = $this->storeid;
            $wp->redirectUrl = $url;
            $wp->notifyUrl = $_W['siteroot'] . 'addons/ewei_shopv2/payment/rm/notify.php';
            $wp->method = [$pay_type];

            $response = $this->rm_object->payment->createWebPayment($wp);
            header("Location:".$response->url);

        } catch(ApiException $e) {
            echo "statusCode : {$e->getCode()}, errorCode : {$e->getErrorCode()}, errorMessage : {$e->getMessage()}";
        } catch(ValidationException $e) {
            var_dump($e->getMessage());
        }  catch(Exception $e) {
            echo $e->getMessage();
        }

    }

    public function qrPay(){
        global $_W,$_GPC;

        try{
            $qrPay = new QRPay();
            $qrPay->currencyType = 'MYR';
            $qrPay->amount = 100;
            $qrPay->isPreFillAmount = true;
            $qrPay->method = ['ALIPAY_CN'];
            $qrPay->redirectUrl = $_W['siteroot'] . 'app/index.php?i='.$_W['uniacid'].'&c=entry&m=ewei_shopv2&do=mobile&r=rmpay_success';
            $qrPay->storeId = $this->storeid;
            $qrPay->type = 'DYNAMIC';
            $qrPay->order->title = '充值';
            $qrPay->order->detail = '商城余额充值';

            $response = $this->rm_object->payment->qrPay($qrPay);
            ppp($response);die;
            $code = m('qrcode')->createQrcode($response->qrCodeUrl);

            return $code;

        } catch(ApiException $e) {
            echo "statusCode : {$e->getCode()}, errorCode : {$e->getErrorCode()}, errorMessage : {$e->getMessage()}";
        } catch(ValidationException $e) {
            var_dump($e->getMessage());
        }  catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function refund($data){
        
        $order = $this->rm_object->payment->refund($data);
        
        return $order;
    }

}