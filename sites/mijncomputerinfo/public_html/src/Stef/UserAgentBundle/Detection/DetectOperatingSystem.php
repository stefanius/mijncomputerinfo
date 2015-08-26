<?php

namespace Stef\UserAgentBundle\Detection;

use Stef\UserAgentBundle\DataProvider\DataProviderInterface;

class DetectOperatingSystem implements DetectorInterface
{
    /**
     * @var DataProviderInterface
     */
    protected $dataprovider;

    /**
     * @param DataProviderInterface $dataprovider
     */
    function __construct(DataProviderInterface $dataprovider)
    {
        $this->dataprovider = $dataprovider;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function detect($input)
    {
        $OS    =   "Unknown OS Platform";

        foreach ($this->dataprovider->get() as $key => $value) {
            if (preg_match('/'.$key.'/i', $input)) {
                $OS    =   $value;
                break;
            }
        }

        return $OS;
    }
}