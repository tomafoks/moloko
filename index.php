<?php
// Kickstart the framework
$f3 = require('lib/base.php');

// Load configuration
$f3->config('db_config.ini');
$f3->config('config.ini');
$f3->config('routes.ini');

new Session();

$f3->run();
