<?php

namespace Omnipay\EpgPayment\Message;


use GuzzleHttp\Message\RequestInterface;

abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{

    protected $endpoint;

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }



    /**
     * Constructor
     *
     * @param RequestInterface $request the initiating request.
     * @param mixed $data
     */
    public function __construct(AbstractRequest $request, $data, $endpoint)
    {
        $this->request = $request;
        $this->data = $data;
        $this->endpoint = $endpoint;
    }
}
