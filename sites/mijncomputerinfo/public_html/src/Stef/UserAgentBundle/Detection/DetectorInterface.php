<?php

namespace Stef\UserAgentBundle\Detection;

Interface DetectorInterface
{
    /**
     * @param $input
     * @return mixed
     */
    public function detect($input);
}