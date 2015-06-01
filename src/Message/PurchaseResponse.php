<?php

namespace Omnipay\EpgPayment\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * EpgPayment Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
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
        return $this->getEndpoint().'/paymentpage?'.http_build_query($this->data);
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
