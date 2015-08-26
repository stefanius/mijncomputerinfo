<?php

namespace Stef\UserAgentBundle\Detection;

use Stef\UserAgentBundle\DataProvider\DataProviderInterface;

class DetectBrowserName implements DetectorInterface
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
        $browserName = 'Unknown Browser';

        foreach ($this->dataprovider->get() as $key => $value) {

            if (preg_match('/'.$key.'/i', $input)) {
                $browserName = $value;
                break;
            }
        }

        return $browserName;
    }
}