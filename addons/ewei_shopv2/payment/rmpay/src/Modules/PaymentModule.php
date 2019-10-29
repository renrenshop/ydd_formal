<?php

namespace RevenueMonster\SDK\Modules;

class PaymentModule extends Module
{
    public function qrPay(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/transaction/qrcode');

        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    public function qrCode(string $qrCode)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/qrcode/$qrCode");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }
    
    public function transactionsByQrCode(string $qrCode, int $limit = 10)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/qrcode/{$qrCode}/transactions?limit=$limit");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }

    public function quickPay(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/quickpay');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    public function refund(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/refund');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    /**
     * Reverse payment
     * @param array
     * @return stdClass
     * @throws ApiException
     */
    public function reverse(array $args = [])
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/reverse');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }

    /**
     * List transactions
     * @param string $transactionId 
     * @return Tightenco\Collect\Support\Collection
     * @throws ApiException
     */
    public function paginate(int $limit = 100)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transactions?limit=$limit");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }

    /**
     * Find transaction by transaction id
     * @param string $transactionId 
     * @return stdClass
     * @throws ApiException
     */
    public function find(string $transactionId)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/$transactionId");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }

    /**
     * Find transaction by order id
     * @param string $orderId 
     * @return stdClass
     * @throws ApiException
     */
    public function findByOrderId(string $orderId)
    {
        $uri = $this->getOpenApiUrl('v3', "/payment/transaction/order/$orderId");
        return $this->mapResponse($this->callApi('get', $uri)->send());
    }


    /**
     * Find transaction by order id
     * @param string $orderId
     * @return stdClass
     * @throws ApiException
     */
    public function createWebPayment($args)
    {
        $uri = $this->getOpenApiUrl('v3', '/payment/online');
        return $this->mapResponse($this->callApi('post', $uri, $args)->send());
    }
}