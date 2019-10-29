<?php

require __DIR__.'/../vendor/autoload.php';
// require __DIR__.'/src/helper/util.php';

use RevenueMonster\SDK\RevenueMonster;
use RevenueMonster\SDK\Exceptions\ApiException;

//'clientId' => '1548232445914289504',
//'clientSecret' => 'HfJMegZlfYBNTjpJmniPblygODVGxwJy',
//'privateKey' => file_get_contents(__DIR__.'/private_key.pem'),
$payment_bak = array(
    'clientId' => trim($config['clientId']),
    'clientSecret' => trim($config['clientSecret']),
    'privateKey' => trim($rmpay_config['private_key']),
    'version' => 'stable',
    'sandbox' => false,
);
//沙盒账户
$payment = array(
    'clientId' => '1548232445914289504',
    'clientSecret' => 'HfJMegZlfYBNTjpJmniPblygODVGxwJy',
    'privateKey' => file_get_contents(__DIR__.'/private_key.pem'),
    'version' => 'stable',
    'sandbox' => false,
);
//正式账户
$payment_new = array(
    'clientId' => '1562920126784908064',
    'clientSecret' => 'WZelfXiNXanSvMWHmdESuEiFrWwaOfwO',
    'privateKey' => file_get_contents(__DIR__.'/private_keys.pem'),
//    'privateKey' => trim($rmpay_config['private_key']),
    'version' => 'stable',
    'sandbox' => false,
);

$rm = new RevenueMonster($payment_bak);
echo '<pre>';
print_r($rm);die;
?>
