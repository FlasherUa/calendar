
<?php
/**
 * Social mrta tags helper class
* @author Flasher
*
*/
class SocialMetas extends Sonja_SocialMetas {
	
/**
 * specisifc for this project
*@param
* 
*/
	public static function setItem ($item) {
		//self::$title=	addslashes($item['title']);
    self::$title= htmlspecialchars($item['title']);
		self::$description="New best videos every day";
		self::$url=Request::current()->url(true);//URL::base(true)."play/".$item['id'];
	//self::$image="http://img.youtube.com/vi/". $item['utlink']."/0.jpg";
  //alart $image;
self::$image=URL::base(true)."picture.php?u=". $item['utlink']."&r=".$item['resolution'];
		
		parent::factory(); 
	}
	
	public static function setList() {
		
		self::$title=	addslashes(Model::factory("seometas")->Title());
		self::$description="New best videos every day";
		self::$url=Request::current()->url(true);
		self::$image=URL::base(true)."img/fblogo.jpg";
		parent::factory();
	}
}