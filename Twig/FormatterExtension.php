<?php

namespace Nfq\Bundle\SoapBundle\Twig;


use PrettyXml\Formatter;

class FormatterExtension extends \Twig_Extension
{
    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * AppExtension constructor.
     *
     * @param Formatter $formatter
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }


    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('formatxml', array($this, 'formatXml')),
        );
    }

    public function formatXml($xml, $indentSize = 4, $indentCharacter = " ")
    {
        $this->formatter->setIndentSize($indentSize);
        $this->formatter->setIndentCharacter($indentCharacter);
        $formatted = $this->formatter->format($xml);

        return $formatted;
    }

    public function getName()
    {
        return 'app_extension';
    }
}
