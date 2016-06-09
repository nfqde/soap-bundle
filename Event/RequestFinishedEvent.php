<?php

/*
 * This file is part of the SoapBundle package.
 *
 * (c) 2016 .NFQ | Netzfrequenz GmbH <info@nfq.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nfq\Bundle\SoapBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Event being thrown after successful SOAP request/response cycle.
 */
class RequestFinishedEvent extends Event
{
    /**
     * @var string
     */
    private $requestHeaders;

    /**
     * @var string
     */
    private $requestBody;

    /**
     * @var string
     */
    private $responseHeaders;

    /**
     * @var string
     */
    private $responseBody;

    /**
     * @var float In milliseconds.
     */
    private $duration;

    /**
     * @param string $requestHeaders
     * @param string $requestBody
     * @param string $responseHeaders
     * @param string $responseBody
     * @param float  $duration
     */
    public function __construct($requestHeaders, $requestBody, $responseHeaders, $responseBody, $duration)
    {
        $this->requestHeaders = $requestHeaders;
        $this->requestBody = $requestBody;
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getRequestHeaders()
    {
        return $this->requestHeaders;
    }

    /**
     * @return string
     */
    public function getRequestBody()
    {
        return $this->requestBody;
    }

    /**
     * @return string
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * @return string
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
