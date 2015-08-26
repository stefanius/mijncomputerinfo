<?php

namespace Stef\UserAgentBundle\Processor;

use Stef\UserAgentBundle\Detection\DetectorInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

abstract class AbstractUserAgentProcessor
{
    protected function process(array $detectors, $useragent)
    {
        $bag = new ParameterBag();

        foreach ($detectors as $detector) {
            if($detector[0] instanceof DetectorInterface){
                $bag->set($detector[1], $detector[0]->detect($useragent));
            }
        }

        return $bag;
    }

    public function execute($useragent)
    {
        $detectors = $this->buildDetectors();

        return $this->process($detectors, $useragent);
    }

    abstract protected function buildDetectors();

}