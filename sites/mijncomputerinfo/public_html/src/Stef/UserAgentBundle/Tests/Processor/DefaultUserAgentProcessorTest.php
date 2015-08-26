<?php

namespace Stef\UserAgentBundle\Tests\Processor;

use Stef\UserAgentBundle\DataProvider\OperatingSystems;
use Stef\UserAgentBundle\Detection\DetectOperatingSystem;
use Stef\UserAgentBundle\Processor\DefaultUserAgentProcessor;

class DefaultUserAgentProcessorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DefaultUserAgentProcessor;
     */
    protected $processor;

    protected function setUp()
    {
        $this->processor = new DefaultUserAgentProcessor();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testDetection($input, $expected = array())
    {
        $result = $this->processor->execute($input);

        $this->assertEquals(count($expected), $result->count());

        foreach ($expected as $key => $value) {
            $this->assertEquals($value, $result->get($key));
        }
    }

    public function dataProvider()
    {
        $agent_01 = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36";

        $expected_01 = [
            'browser_version' => '37.0.2062.120',
            'browser_name' => 'Google Chrome',
            'operating_system' => 'Linux',
        ];

        return [
            [$agent_01, $expected_01],
        ];
    }
}