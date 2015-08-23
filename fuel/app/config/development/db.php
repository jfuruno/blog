<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=myblog;unix_socket=/tmp/mysql.sock',
			'username'   => 'dbuser',
			'password'   => 'dbpass',
		),
        'profiling'=>true,   
	),
);
