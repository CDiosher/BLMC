<?php
$production = ($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='themarketers.x10.bz') ? FALSE : TRUE;

if ($production){
	
	define('ENVIRONMENT', 'development');
	
	define('_BASE_URL_','http://localhost/thesis/');
	define('_URI_PROTOCOL_','AUTO');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_DATABASE_','themark4_admin');


}else{
	
	define('_BASE_URL_','http://localhost/thesis/');
	define('_URI_PROTOCOL_','REQUEST_URI');
	define('_DB_USERNAME_','root');
	define('_DB_PASSWORD_','');
	define('_DB_DATABASE_','themark4_admin');

}