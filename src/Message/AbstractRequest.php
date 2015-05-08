<?php

namespace Omnipay\EpgPayment\Message;

use Guzzle\Common\Event;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://apps.epg-services.com/V2/pp/tokenizer';

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getMerchantGuid()
    {
        return $this->getParameter('merchantGuid');
    }

    public function setMerchantGuid($value)
    {
        return $this->setParameter('merchantGuid', $value);
    }


    public function getTransactionType()
    {
        return $this->getParameter('transactionType');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transactionType', $value);
    }

    public function setTransactionUrl($value)
    {
        return $this->setParameter('transactionUrl', $value);
    }

    public function getTransactionUrl()
    {
        return $this->getParameter('transactionUrl');
    }

    public function getEpgToken()
    {
        $httpResponse = $this->httpClient->post($this->endpoint.'/get', null, $this->getData())
            ->send();
        if ($httpResponse->getBody()) {
            // JSON string: { ... }
            parse_str($httpResponse->getBody(),$tokenResponse);
            return $tokenResponse;
        }
        return null;
    }

}
