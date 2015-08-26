<?php

namespace Stef\UserAgentBundle\DataProvider;

class OperatingSystems implements DataProviderInterface
{
    /**
     * @return array
     */
    public function get()
    {
        $operatingSystems = [
            'windows nt 6.3'     =>  'Windows 8.1',
            'windows nt 6.2'     =>  'Windows 8',
            'windows nt 6.1'     =>  'Windows 7',
            'windows nt 6.0'     =>  'Windows Vista',
            'windows nt 5.2'     =>  'Windows Server 2003/XP x64',
            'windows nt 5.1'     =>  'Windows XP',
            'windows xp'         =>  'Windows XP',
            'windows nt 5.0'     =>  'Windows 2000',
            'windows nt 4.0'     =>  'Windows NT 4.0',
            'windows me'         =>  'Windows ME',
            'win98'              =>  'Windows 98',
            'win95'              =>  'Windows 95',
            'win16'              =>  'Windows 3.11',
            'windows 3.1'        =>  'Windows 3.1',
            'macintosh'			 =>  'Mac OS X',
            'mac os x'			 =>  'Mac OS X',
            'macintosh|mac os x' =>  'Mac OS X',
            'mac_powerpc'        =>  'Mac OS 9',
            'linux'              =>  'Linux',
            'ubuntu'             =>  'Ubuntu (Linux)',
            'iphone'             =>  'iPhone',
            'ipod'               =>  'iPod',
            'ipad'               =>  'iPad',
            'android'            =>  'Android',
            'blackberry'         =>  'BlackBerry',
            'webos'              =>  'Mobile',
            'windows nt'         =>  'Microsoft Windows',
            'openbsd'            =>  'OpenBSD',
        ];

        return $operatingSystems;
    }
}