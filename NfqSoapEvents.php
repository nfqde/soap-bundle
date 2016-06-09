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

/**
 * Events that are being dispatched by SoapBundle.
 */
class NfqSoapEvents
{
    /**
     * @see Event\RequestFinishedEvent
     */
    const REQUEST_FINISHED = 'nfq_soap.request_finished';
}
