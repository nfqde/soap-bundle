<?php

/*
 * This file is part of the SoapBundle package.
 *
 * (c) 2016 .NFQ | Netzfrequenz GmbH <info@nfq.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nfq\Bundle\SoapBundle;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Soap Client Factory.
 */
class Factory
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * Constructor.
     *
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Create a Soap Client.
     *
     * @param string $wsdl
     * @param array  $options
     *
     * @return \SoapClient
     */
    public function create($wsdl, $options = [])
    {
        return new TraceableSoapClient($this->dispatcher, $wsdl, $options);
    }
}
