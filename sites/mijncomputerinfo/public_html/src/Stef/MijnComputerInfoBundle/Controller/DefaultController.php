<?php

namespace Stef\MijnComputerInfoBundle\Controller;

use Stef\UserAgentBundle\Processor\DefaultUserAgentProcessor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $processor = new DefaultUserAgentProcessor();
        $userAgent = $request->headers->get('User-Agent');
        $ip = $request->getClientIp();
        $browserdata = $processor->execute($userAgent);
        //$geoLocation = $this->getGeoLocation('http://ip-api.com/json/', $ip);

        $jsData = [
            'browser_lang' => ['caption' => 'Browsertaal', 'value' => 'Onbekend'],
            'color_dept' => ['caption' => 'Kleurbereik', 'value' => 'Onbekend'],
            'avail_resolution' => ['caption' => 'Beschikbare resolutie', 'value' => 'Onbekend'],
            'resolution' => ['caption' => 'Resolutiie', 'value' => 'Onbekend'],
            'window_size' => ['caption' => 'Venster formaat', 'value' => 'Onbekend'],
            'history_length' => ['caption' => 'Aantal vorige websites', 'value' => 'Onbekend'],
        ];

        return $this->render('StefMijnComputerInfoBundle:Default:index.html.twig', [
            'user_agent' => $userAgent,
            'ip' => $ip,
            'browserdata' => $browserdata,
            //'geo_location' => $geoLocation,
            'js_data' => $jsData,
        ]);
    }

    protected function getGeoLocation($url, $ip)
    {
        $localIps = ['192.168.', '192.16.', '10.0.'];

        foreach($localIps as $localIp){
            if (strpos($ip, $localIp) !== false) {
                return ['country' => 'Local Area Network', 'countryCode' => 'LAN', 'city' => 'Local Area Network', 'regionName' => 'Local Area Network'];
            }
        }

        $curlOptions = [];
        $curlOptions[CURLOPT_USERAGENT] = "MozillaXYZ/1.0";
        $curlOptions[CURLOPT_HEADER] = 0;
        $curlOptions[CURLOPT_RETURNTRANSFER] = true;
        $curlOptions[CURLOPT_TIMEOUT] = 10;

        if (!function_exists('curl_init')) {
            die('Sorry cURL is not installed!');
        }

        $ch = curl_init();


        $url = trim(trim($url, '/')).'/'.$ip;

        curl_setopt($ch, CURLOPT_URL, $url);

        foreach ($curlOptions as $key=>$value) {
            curl_setopt($ch, $key, $value);
        }

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }
}