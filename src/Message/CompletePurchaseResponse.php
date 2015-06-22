<?php
namespace Omnipay\EpgPayment\Message;

/**
 * EpgPayment Purchase Response
 *
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['ResultStatus']) && 'OK' === $this->data['ResultStatus'];
    }
    public function isCancelled()
    {
        return isset($this->data['ResultStatus']) && 'DECLINE' === $this->data['ResultStatus'];
    }
    public function getTransactionReference()
    {
        return isset($this->data['TransactionReference']) ? $this->data['TransactionReference'] : null;
    }
    public function getMessage()
    {
        return isset($this->data['ResultMessage']) ? $this->data['ResultMessage'] : null;
    }

}
