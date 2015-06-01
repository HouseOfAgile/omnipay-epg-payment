<?php

namespace Omnipay\EpgPayment;

use Omnipay\Common\AbstractGateway;

/**
 * EpgPayment Gateway
 *
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'EpgPayment';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'merchantId' => 'SomeMerchantId',
        );
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getMerchantGuid()
    {
        return $this->getParameter('merchantGuid');
    }

    public function setMerchantGuid($value)
    {
        return $this->setParameter('merchantGuid', $value);
    }


    public function getTransactionType()
    {
        return $this->getParameter('transactionType');
    }

    public function setTransactionType($value)
    {
        return $this->setParameter('transactionType', $value);
    }

    public function setTransactionUrl($value)
    {
        return $this->setParameter('transactionUrl', $value);
    }

    public function getTransactionUrl()
    {
        return $this->getParameter('transactionUrl');
    }

    /**
     * @param  array $parameters
     * @return \Omnipay\EpgPayment\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\EpgPayment\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\EpgPayment\Message\CompletePurchaseRequest', $parameters);
    }

}
