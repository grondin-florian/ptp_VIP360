<?php

define('__ROOT__', '/ptp_VIP360/');
define('__PROD__', __ROOT__.'production/');
define('__IMGDIR__', __PROD__.'images/');
define('__CSSDIR__', __PROD__.'css/');
define('__JSDIR__', __PROD__.'js/');

define('__UPLOADDIR__', 'uploads/');
define('__UPLOADURL__', str_replace('\\', '/', dirname(__FILE__)).'/../'.__UPLOADDIR__);