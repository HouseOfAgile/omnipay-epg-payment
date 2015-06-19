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
        // Get and check result
        print_r($this->getResult($this->httpRequest->get('Token')));
        die('WIP');
    }

}
