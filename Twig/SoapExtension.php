<?php

/*
 * This file is part of the SoapBundle package.
 *
 * (c) 2017 .NFQ | Netzfrequenz GmbH <info@nfq.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nfq\Bundle\SoapBundle\Twig;

use PrettyXml\Formatter;

class SoapExtension extends \Twig_Extension
{
    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * @param Formatter $formatter
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('nfq_soap_pretty_xml', array($this, 'formatXml')),
        );
    }

    /**
     * Pretty format an xml string.
     *
     * @param string $xml
     * @param int    $indentSize
     * @param string $indentCharacter
     *
     * @return string
     */
    public function formatXml($xml, $indentSize = 4, $indentCharacter = ' ')
    {
        $this->formatter->setIndentSize($indentSize);
        $this->formatter->setIndentCharacter($indentCharacter);

        return $this->formatter->format($xml);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return get_class($this);
    }
}
