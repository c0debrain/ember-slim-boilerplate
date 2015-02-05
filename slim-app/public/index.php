<?php

date_default_timezone_set('America/New_York');

require '../vendor/autoload.php';

$app = new \Slim\Slim();
$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'Y29sb2c=')));

// config
require '../app/configs/config.php';
require '../app/configs/database.php';

// other stuff
require '../app/authenticator.php';

// create the tables and stuff
//require '../app/start.php';

// routes
require '../app/routes/index.php';

// default catch-all route
require '../app/routes/catchAll.php';

$app->run();