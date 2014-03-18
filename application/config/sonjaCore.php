<?php

/*
 * dir pathes for Sonja
 */

if ( Kohana::$environment === Kohana::PRODUCTION) {

	define ('CACHE_PATH' , APPPATH.'cache');

	//	define ('traceD', false); // trace D() function
	define ('libraryPath', MODPATH.'sonjaCore/');
	//define ('fd',  "/home/mycineweb/scripts/");

	define ('WWWROOT',  dirname($_SERVER["SCRIPT_FILENAME"]));
	define ('pre','');
	define ('user_files_path', WWWROOT."/userfiles/");
	define ('WWWCACHE' , WWWROOT.'/static/');
	/*JS RESOURSES*/
	define ('adminTheme' , 'js-common/Sonja/admin-charisma/');//JS & images for admin panel
	define ('adminCore' , 'js-common/Sonja/admin-core/');
	//define ('adminRes' , 'http://shostkarr.gov.ua/js-common/Sonja/admin/');//JS & images for admin panel
	define ('js_common' , 'js-common/');//JS common
	define ('jQuery' , 'js-common/jquery/jquery-1.10.2.min.js');//JS common

	define ('user_files_path_tmp', "/home/mp/");
}else {

	define ('CACHE_PATH' , APPPATH.'cache');


	//	define ('traceD', false); // trace D() function
	define ('libraryPath', MODPATH.'sonjaCore/');
	//define ('fd',  "/home/mycineweb/scripts/");
	define ('WWWROOT',  dirname($_SERVER["SCRIPT_FILENAME"]));
	define ('pre','');
	define ('user_files_path', WWWROOT."/userfiles/");
	define ('WWWCACHE' , WWWROOT.'/static/');
	/*JS RESOURSES*/
	define ('adminTheme' , 'http://localhost/framework/constructor3/projects2/js-common/Sonja/admin-charisma/');//JS & images for admin panel
	define ('adminCore' , 'http://localhost/framework/constructor3/projects2/js-common/Sonja/admin-core/');
	define ('js_common' , 'http://localhost/framework/constructor3/projects2/js-common/');//JS common
	define ('jQuery' , 'http://localhost/framework/constructor3/projects2/js-common/jquery/jquery-1.10.2.min.js');//JS common
	define ('user_files_path_tmp', "/home/mycineweb/tmp/");


}

	define ('SONJA_PATH', libraryPath );
	define ('appPath', APPPATH);
	define ("redirOnLogin", "");

	define ('AUTOLOAD_CACHE',  CACHE_PATH.'/noClear/autoload.txt');
	define("noUserInput",true);//if admin panel has only one user, no username from to show


  	User::$permType="single";
 	User::$permissions=array(
 	'default'=>array('texts1'=>array('view','list')),
 	'admin'=>array('all')//'config'=>array('add','edit','list'), 'markers'=>'all'
  	);
 
  	Conf::$defaults=array('list_rawsPerPage'=>15);
return array();