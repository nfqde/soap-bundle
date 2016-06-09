<?php

namespace Nfq\Bundle\SoapBundle\Tests\DataCollector;

use Nfq\Bundle\SoapBundle\DataCollector\SoapDataCollector;
use Nfq\Bundle\SoapBundle\Event\RequestFinishedEvent;

/**
 * @see SoapDataCollector
 */
class SoapDataCollectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvideOnRequestFinished
     */
    public function testOnRequestFinished($events, $expectedTotal, $expectedTime)
    {
        $collector = new SoapDataCollector();

        foreach ($events as $event) {
            $collector->onRequestFinished($event);
        }

        $this->assertEquals($expectedTotal, $collector->getTotal());
        $this->assertEquals($expectedTime, $collector->getTime());
        $this->assertEquals($expectedTotal, count($collector->getRequests()));
    }

    public function dataProvideOnRequestFinished()
    {
        return array(
            array(array(), 0, 0),
            array(
                array(
                    new RequestFinishedEvent(
                        'Request headers',
                        'Request body',
                        'Respone headers',
                        'Response body',
                        12
                    ),
                ),
                1,
                12,
            ),
            array(
                array(
                    new RequestFinishedEvent(
                        'Request headers',
                        'Request body',
                        'Respone headers',
                        'Response body',
                        12
                    ),
                    new RequestFinishedEvent(
                        'Request headers',
                        'Request body',
                        'Respone headers',
                        'Response body',
                        28.8
                    ),
                ),
                2,
                40.8,
            ),
        );
    }
}
