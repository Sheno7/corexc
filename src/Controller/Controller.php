<?php

namespace Corexc\Controller;

use Corexc\Response\Response;

class Controller
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }
}