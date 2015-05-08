<?php

namespace Omnipay\EpgPayment\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * EpgPayment Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $endpoint = 'https://apps.epg-services.com/V2/pp/paymentpage';
    protected $epgToken;

    /**
     * @return mixed
     */
    public function getEpgToken()
    {
        return $this->epgToken;
    }

    /**
     * @param mixed $epgToken
     */
    public function setEpgToken($epgToken)
    {
        $this->epgToken = $epgToken;
    }

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->endpoint.'?'.http_build_query($this->data);
    }

    public function getRedirectMethod()
    {
        return 'POST';
    }


    public function getRedirectData()
    {
        return $this->getData();
    }
}
