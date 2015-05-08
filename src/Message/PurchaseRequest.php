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


        $data['FirstName'] = $this->getCard()->getFirstName();
        $data['LastName'] = $this->getCard()->getLastName();
        $data['Email'] = $this->getCard()->getEmail();
        $data['Country'] = $this->getCard()->getCountry();
        $data['Phone'] = $this->getCard()->getPhone();
        $data['TransactionReference'] = "45454";


        return $data;
    }


    public function sendData($data)
    {
        $token = $this->getEpgToken();
        if ($token != null) {
            if ($token['ResultStatus'] == "OK" && $token['Token'] != null) {
                $newData = array_merge($data, array('Token' => $token['Token']));
                return $this->response = new PurchaseResponse($this, $newData);
            }
        }

    }
}
