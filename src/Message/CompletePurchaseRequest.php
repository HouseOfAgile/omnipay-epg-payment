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
        $epgResult=$this->getResult($this->httpRequest->get('Token'));
        return $this->response = new CompletePurchaseResponse($this, $epgResult,$this->getEndpoint());

    }

}
