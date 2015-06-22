<?php

namespace Omnipay\EpgPayment\Message;

use Guzzle\Common\Event;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $liveEndpoint = 'https://pay.epg-services.com';
    protected $testEndpoint = 'https://pay.is.epg-services.com';

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

    public function setFirstname($value)
    {
        return $this->setParameter('firstname', $value);
    }

    public function getFirstname()
    {
        return $this->getParameter('firstname');
    }

    public function setLastname($value)
    {
        return $this->setParameter('lastname', $value);
    }

    public function getLastname()
    {
        return $this->getParameter('lastname');
    }


    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }


    public function setAddress($value)
    {
        return $this->setParameter('address', $value);
    }

    public function getAddress()
    {
        return $this->getParameter('address');
    }

    public function setZip($value)
    {
        return $this->setParameter('zip', $value);
    }

    public function getZip()
    {
        return $this->getParameter('zip');
    }

    public function setCity($value)
    {
        return $this->setParameter('city', $value);
    }

    public function getCity()
    {
        return $this->getParameter('city');
    }

    public function setCountry($value)
    {
        return $this->setParameter('country', $value);
    }

    public function getCountry()
    {
        return $this->getParameter('country');
    }


    public function getEpgToken()
    {
        $httpResponse = $this->httpClient->post($this->getEndpoint() . '/tokenizer/get', null, $this->getData())
            ->send();
        if ($httpResponse->getBody()) {
            // JSON string: { ... }
            parse_str($httpResponse->getBody(), $tokenResponse);
            return $tokenResponse;
        }
        return null;
    }

    public function getResult($resultToken)
    {
        $newData = array_merge(array('MerchantId' => $this->getMerchantId()), array('MerchantGuid' => $this->getMerchantGuid()), array('Token' => $resultToken));


        $httpResponse = $this->httpClient->post($this->getEndpoint() . '/tokenizer/getresult', null, $newData)
            ->send();
        if ($httpResponse->getBody()) {
            // JSON string: { ... }
            parse_str($httpResponse->getBody(), $tokenResponse);
            return $tokenResponse;
        }
        return null;
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

}
