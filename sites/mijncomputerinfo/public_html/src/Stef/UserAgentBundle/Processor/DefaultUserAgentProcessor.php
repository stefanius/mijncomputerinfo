<?php

namespace Stef\UserAgentBundle\Processor;

use Stef\UserAgentBundle\DataProvider\Browsers;
use Stef\UserAgentBundle\DataProvider\OperatingSystems;
use Stef\UserAgentBundle\Detection\DetectBrowserName;
use Stef\UserAgentBundle\Detection\DetectBrowserVersion;
use Stef\UserAgentBundle\Detection\DetectOperatingSystem;

class DefaultUserAgentProcessor extends AbstractUserAgentProcessor
{
    protected function buildDetectors()
    {
        return [
            [new DetectBrowserVersion(new Browsers()), 'browser_version'],
            [new DetectBrowserName(new Browsers()), 'browser_name'],
            [new DetectOperatingSystem(new OperatingSystems()), 'operating_system'],
        ];
    }
}