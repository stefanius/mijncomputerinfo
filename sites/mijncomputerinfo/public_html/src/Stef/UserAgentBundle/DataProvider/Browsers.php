<?php

namespace Stef\UserAgentBundle\DataProvider;

class Browsers implements DataProviderInterface
{
    /**
     * @return array
     */
    public function get()
    {
        $browsers = [
            'MSIE'	   => 'Internet Explorer',
            'Firefox'  => 'Mozilla Firefox',
            'Chrome'   => 'Google Chrome',
            'Safari'   => 'Apple Safari',
            'Opera'	   => 'Opera',
            'Netscape' => 'Netscape',
        ];

        return $browsers;
    }
}