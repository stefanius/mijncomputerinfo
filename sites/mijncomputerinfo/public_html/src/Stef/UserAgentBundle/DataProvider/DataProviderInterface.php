<?php

namespace Stef\UserAgentBundle\DataProvider;

interface DataProviderInterface
{
    /**
     * @return array
     */
    public function get();
}