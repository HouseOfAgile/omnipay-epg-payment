<?php
namespace Omnipay\EpgPayment\Message;

/**
 * EpgPayment Purchase Request
 *
 * @method \Omnipay\EpgPayment\Message\PurchaseResponse send()
 */
class PurchaseRequest extends AbstractRequest
{

    public function getMetadata()
    {
        return $this->getParameter('metadata');
    }

    public function setMetadata($value)
    {
        return $this->setParameter('metadata', $value);
    }

    public function getData()
    {
        $this->validate('MerchantId', 'MerchantGuid', 'ReturnUrl', 'Amount', 'Currency');


        $data = array();

        $data['MerchantId'] = $this->getMerchantId();
        $data['MerchantGuid'] = $this->getMerchantGuid();
        $data['TransactionReference'] = $this->getTransactionReference();
        $data['ReturnUrl'] = $this->getReturnUrl();
        $data['TransactionType'] = $this->getTransactionType();
        $data['Amount'] = $this->getAmount();
        $data['Currency'] = $this->getCurrency();
        $data['FirstName'] = $this->getFirstName();
        $data['Email'] = $this->getEmail();
        $data['Country'] = $this->getCountry();
        $data['Phone'] = $this->getPhone();

        $webhookUrl = $this->getNotifyUrl();
        if (null !== $webhookUrl) {
            $data['webhookUrl'] = $webhookUrl;
        }

        return $data;
    }

    public function sendData($data)
    {
        $httpResponse = $this->sendRequest('POST', '/get_result', $data);

        return $this->response = new PurchaseResponse($this, $httpResponse->json());
    }
}
