<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Redis settings
| -------------------------------------------------------------------------
| Your Redis servers can be specified below.
|
|	See: https://codeigniter.com/userguide3/libraries/caching.html#redis-caching
|
*/
$config = array(
	'socket_type' => 'tcp',
	'host'        => 'redis',
	'password'    => NULL,
	'port'        => 6379,
	'timeout'     => 0
);
