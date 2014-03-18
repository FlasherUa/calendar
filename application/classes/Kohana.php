<?php defined('SYSPATH') OR die('No direct script access.');

	//die("Tutu");

/* SONJA patch over kohana core */
class Kohana extends Kohana_Core {

		
	public  static function auto_load($class, $directory = 'classes'){
		if (parent::auto_load($class,$directory)) return TRUE;
		//echo "Tutu";
		/*class was  NOT found by kohana system*/
		
		return Autoloader::loadClass($class);
		
	}


}
