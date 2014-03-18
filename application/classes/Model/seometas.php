<?php


class Model_Seometas extends Model{
	private static $_data;
	private static $_page_title;
	
	public static function Title($t=null) {
		if (isset($t)) { self::$_data['title']=$t; return;}
	 	if(!isset(self::$_data))self::load();
		return htmlspecialchars(self::$_data['title'].self::$_page_title);
	}
	
	public static function Descr($t=null) {
	if (isset($t)) { self::$_data['Description']=$t; return;}
	
		if(!isset(self::$_data))self::load();
		return htmlspecialchars(self::$_data['Description']);
	}
	
	private static function load () {
		$rq=Controller::$current->request->uri();
		if ($rq=="home/index" || $rq=="/" || $rq=="" )$rq="index";
//		$r=DB::query(Database::SELECT, "SELECT * FROM seometas WHERE link LIKE :link OR link LIKE 'default' ORDER BY id DESC Limit 0,1; ")->bind(":link", $rq)
		$page_title='';

		if(stristr($rq,'/')) {
			$rqs=explode('/',$rq);
			if(is_numeric($rqs[1])) {
			$rq=$rqs[0];
			$page_title=' - Page '.$rqs[1];
			self::$_page_title=$page_title;
			}
			if(isset($rqs[2]) && is_numeric($rqs[2])) {
			$rq=$rqs[0].'/'.$rqs[1];
			$page_title=' - Page '.$rqs[2];
			self::$_page_title=$page_title;
			}
		}
		$query="SELECT * FROM seometas WHERE link LIKE '%".$rq."%' OR link LIKE 'default' ORDER BY id DESC Limit 0,1; ";
		//die($rqs[1]);
		$r=DB::query(Database::SELECT, $query)->execute()->as_array();
		//ob_end_clean(); d($rq);die();
		self::$_data=@$r[0];
	}
	
}