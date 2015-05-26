<?php
namespace Omnipay\EpgPayment\Message;

/**
 * EpgPayment Purchase Request
 *
 */
class CompletePurchaseRequest extends AbstractRequest
{


    public function getData()
    {
        return $this->httpRequest->request->all();
    }

    public function sendData($data)
    {
        die('Not implemented');
    }

}
