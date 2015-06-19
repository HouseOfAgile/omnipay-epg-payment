<?php

namespace Omnipay\EpgPayment\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * EpgPayment Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{


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
        return $this->getEndpoint().'/'.$this->getEpgToken();
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }


    public function getRedirectData()
    {
        return $this->getData();
    }

    public function getEpgToken()
    {
        return $this->getData()['Token'];
    }
}
