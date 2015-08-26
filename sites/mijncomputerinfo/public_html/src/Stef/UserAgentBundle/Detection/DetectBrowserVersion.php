<?php

namespace Stef\UserAgentBundle\Detection;

use Stef\UserAgentBundle\DataProvider\DataProviderInterface;

class DetectBrowserVersion implements DetectorInterface
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
        $browserVersion = 'Unknown';

        if (preg_match('/MSIE(?<version>.*?)Windows/i', $input, $result)) {
            $browserVersion = trim($result['version']);
            $browserVersion = trim($browserVersion, ';');
            $browserVersion = trim($browserVersion, ',');
        } elseif (preg_match('/Chrome(?<version>.*?)Safari/i', $input, $result)) {
            $browserVersion = trim($result['version']);
            $browserVersion = trim($browserVersion, '/');
        }

        return $browserVersion;
    }
}