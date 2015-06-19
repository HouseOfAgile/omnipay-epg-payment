<?php
namespace Omnipay\EpgPayment\Message;

/**
 * EpgPayment Purchase Request
 *
 */
class PurchaseRequest extends AbstractRequest
{


    public function getData()
    {
        $this->validate('amount');

        $data = array();

        $data['MerchantId'] = $this->getMerchantId();
        $data['MerchantGuid'] = $this->getMerchantGuid();
        $data['TransactionReference'] = $this->getTransactionReference();
        $data['ReturnUrl'] = $this->getReturnUrl();
        $data['TransactionUrl'] = $this->getTransactionUrl();
        $data['TransactionType'] = $this->getTransactionType();

        $data['Amount'] = $this->getAmount();
        $data['Currency'] = $this->getCurrency();
        $data['FirstName'] = 'John';
//        $data['FirstName'] = $this->getFirstname();
//        $data['LastName'] = $this->getLastname();
        $data['LastName'] = 'Doe';
        $data['Email'] = $this->getEmail();
        $data['Country'] = $this->getCountry();
        $data['City'] = $this->getCity();


        return $data;
    }


    public function sendData($data)
    {
        $token = $this->getEpgToken();
        if ($token != null) {
            if ($token['ResultStatus'] == "OK" && $token['Token'] != null) {
                $newData = array_merge(array('MerchantId'=>$data['MerchantId']), array('MerchantGuid'=>$data['MerchantGuid']), array('Token' => $token['Token']));
                // seems epg need some time to handle the paymentpage request
                sleep(3);
                return $this->response = new PurchaseResponse($this, $newData, $this->getEndpoint());
            } else {
                throw new \HttpException(404, "Error with payment system");
            }
        }

    }
}
