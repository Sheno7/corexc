<?php
require_once __DIR__ . '/../vendor/autoload.php';

//begin app with basic setting
\Corexc\App::start();

require_once __DIR__ .'/../src/Route/route.php';

//close connection
\Corexc\App::close();