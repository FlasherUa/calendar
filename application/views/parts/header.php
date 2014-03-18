<!DOCTYPE html>
<html class="full" lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
	content="<?php  /*echo Model::factory("seometas")->Title();*/  ?>">
<meta name="author" content="">
<base href="<?php echo URL::base(); ?>" />
<title><?php  /*echo Model::factory("seometas")->Title();*/  ?> MyMap</title>
<?

if (PRODUCTION_MODE) $slash=URL::base();
else $slash="";
htmlPage::addCSS (array(
$slash."css/bootstrap.min.css",
$slash."css/theme.css"

)) ;


/**
 * install footer js
 */
/*init jquery*/
if (PRODUCTION_MODE)  htmlPage::addJSFooter('http://code.jquery.com/jquery-1.10.2.min.js', "");
else htmlPage::addJSFooter('js/jquery-1.10.2.js', "");

$addJs=array();
$addJs[]="js/gmaps/gmaps.js";
$addJs[]="js/app/config.js";

/*init marionette*/
$addJs[]=js_common.'plugins/backbone/underscore-min.js';
$addJs[]=js_common.'plugins/backbone/backbone1.1.1-min.js';
$addJs[]=js_common.'plugins/marionette/backbone.marionette.min.js';

$addJs[]="js/app/gmapMethods.js";
	

if (adminIn===true) {
	/*init datetime picker*/
	$addJs[]=js_common.'plugins/forms/datetime/jquery.simple-dtpicker.js';
	/*init images drop down */
	$addJs[]='js/jquery.dd.min.js';
	htmlPage::addCSS (array("css/dd.css",
	$slash.js_common.'plugins/forms/datetime/jquery.simple-dtpicker.css' )
	);
	/*init app */
	$addJs[]="js/app/adminMapClasses.js";
	;
} else {
	
	/*init guest app*/
	$addJs[]="js/app/userMapClasses.js";
}
/*bootstrap*/
$addJs[]=$slash."js/bootstrap.min.js";
$addJs[]=$slash."js/theme.js";

/*cool alerts*/
//adminTheme.'js/bootbox.min.js'
echo htmlPage::addHeader();
htmlPage::addJSFooter($addJs );
?>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	  <script src="js/respond.min.js"></script>
<![endif]-->

<!-- The fav icon -->
<link href="/img/favicon.ico" rel="icon" type="image/x-icon" />
</head>