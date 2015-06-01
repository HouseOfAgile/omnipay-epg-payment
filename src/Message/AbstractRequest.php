<?php

namespace Omnipay\EpgPayment\Message;

use Guzzle\Common\Event;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{

    protected $liveEndpoint = 'https://apps.epg-services.com/V2/pp';
    protected $testEndpoint = 'https://apps.is.epg-services.com/V2/pp';

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


    public function setCountry($value)
    {
        return $this->setParameter('country', $value);
    }

    public function getCountry()
    {
        return $this->getParameter('country');
    }


    public function setCity($value)
    {
        return $this->setParameter('city', $value);
    }

    public function getCity()
    {
        return $this->getParameter('city');
    }

    public function getEpgToken()
    {
        $httpResponse = $this->httpClient->post($this->getEndpoint().'/tokenizer/get', null, $this->getData())
            ->send();
        if ($httpResponse->getBody()) {
            // JSON string: { ... }
            parse_str($httpResponse->getBody(),$tokenResponse);
            return $tokenResponse;
        }
        return null;
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

}
