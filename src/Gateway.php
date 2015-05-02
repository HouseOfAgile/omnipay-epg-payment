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
            'apiKey' => ''
        );
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * @param  array                                   $parameters
     * @return \Omnipay\EpgPayment\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\EpgPayment\Message\PurchaseRequest', $parameters);
    }

}
