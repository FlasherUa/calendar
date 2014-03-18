<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(

	'driver'       => 'File',
	'hash_method'  => 'sha256',
	'hash_key'     => 8764645800876,
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'au',

	// Username/password combinations for the Auth File driver
	'users' => array(
		'admin' => '50a15325bf8c71810c86399bd6085268b0a0e19bf3f4772371800225ffe07fe8',
	),

);
