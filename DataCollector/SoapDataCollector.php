<?php

/*
 * This file is part of the SoapBundle package.
 *
 * (c) 2017 .NFQ | Netzfrequenz GmbH <info@nfq.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nfq\Bundle\SoapBundle\DataCollector;

use Nfq\Bundle\SoapBundle\Event\RequestFinishedEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/**
 * SoapDataCollector.
 *
 * This is listening on nfq_soap.request_finished events and populates data
 * according to event data.
 */
class SoapDataCollector extends DataCollector
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->data = array(
            'total' => 0,
            'time' => 0,
            'requests' => array(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        // Do nothing here. Everything is being handled by events.
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'nfq_soap';
    }

    /**
     * On Soap request/response cycle finished callback.
     *
     * @param RequestFinishedEvent $event
     */
    public function onRequestFinished(RequestFinishedEvent $event)
    {
        $request = array(
            'request_headers' => $event->getRequestHeaders(),
            'request_body' => $event->getRequestBody(),
            'response_headers' => $event->getResponseHeaders(),
            'response_body' => $event->getResponseBody(),
            'duration' => $event->getDuration(),
        );

        $this->data['total']++;
        $this->data['time'] += $event->getDuration();
        $this->data['requests'][] = $request;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->data['total'];
    }

    /**
     * @return int Time in milliseconds.
     */
    public function getTime()
    {
        return $this->data['time'];
    }

    /**
     * @return array
     */
    public function getRequests()
    {
        return $this->data['requests'];
    }
}
