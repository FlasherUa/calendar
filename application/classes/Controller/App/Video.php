<?php

Class Controller_App_Video extends Controller{
	private $nuserId;
	public static $_messages=array(
			1=>'The movie is already in database. Please add  another one',
			2=>"Broken link.Please enter the link from the movie page, not playlist.",
			"addStep1"=>"<b>STEP 1</b>: Review the video and Choose one or more Categories",
			"addStep2"=>"<b>STEP 2</b>: Share the fun to your friends",
			"addStep3"=>"<b>Thank you!</b> The video was submitted to the VidPit",

			"buttStep1"=>array(),
			"buttStep2"=>array(),
			"buttStep3"=>array(),
	);


	function before () {
		parent::before();
		$nuserId=Session::instance()->get("nuser", false);
		if ($nuserId===false)
		{

			$this->errorCM (Controller_App_User::$_messages[4]);

		}
		if (!Session::instance()->get("userConfirmed",false)) {

			$this->errorCM (Controller_App_User::$_messages[2]);

		}

		$this->nuserId=$nuserId;




	}

	/**
	 * add video Error
	 * @param unknown_type $e
	 */
	private function errorCM ($e){
		$this->clientMessage=ClientMessage_Error::factory("#amForm", $e);
		$this->request->action("void");
	}
	/**
	 * add step1
	 */
	public function action_check(){
		/*check if user is confirmed*/

		$url=$this->request->post("utlink");
		//parse link
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
		{
			$utlink = $match[1];
		}
		else
		{	//"wrong link";
			$this->errorCM(self::$_messages[1]);
			return;


		}
		if (self::_existsInDB($utlink)){
			/** link already in db; */
			$this->errorCM(self::$_messages[1]);
			return;
		}
		//now go to youtube
		$atom=file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$utlink);

		$title=self::_getStr("<title type='text'>", "</title>", $atom);
		$title=htmlspecialchars($title,ENT_QUOTES  );
		$length=self::_getStr("duration='", "'", $atom);
		if ( (int)$length>=Conf::get("maxVideoLen"))
		{
			//maxVideolength error
			$e="<span class='glyphicon glyphicon-film'></span > Maximum video length of ".Conf::get("maxVideoLen")." seconds exeeded";
			$this->errorCM($e);
			return;
		}
		/*show modal*/
		$length=self::prepareLen($length);

		$r=View::factory("modals/addStep1")
		->bind("length", $length)
		->bind("utlink", $utlink)
		->bind("title", $title)
		->bind("id", $id);

		/*$this->clientMessage=ClientMessage_Modal::factory(self::$_messages["addStep1"], $r)
			->addButton ("Save&Continue","onEditSave");
		*/
		$this->clientMessage=ClientMessage_Modal::factory(Controller_App_Video::$_messages["addStep1"], $r);
		$this->clientMessage->addButton ("Save&Continue","onEditSave");

	}

	public function action_save(){
		$rq=&$this->request;
		$length=$rq->post("length");
		$utlink=$rq->post("utlink");
		$title=$rq->post("title");
		/*pack multiple categories*/
		$categories=aTable::MultipleArrToVal($rq->post("categories"));
		$resolution=self::youtube_image($utlink);
		
		$userId=Session::instance()->get("nuser", false);

		try{
			$q=DB::insert("videos",array("title", "utlink","length", "user","categories","resolution"))

			->values(array($title,$utlink,$length,$userId,$categories,$resolution));
			$id=$q->execute();
		} catch(Exeption $e){
		};

		$id=$id[0];
		//if added ok
		if (is_int($id))  {

			/*CARE AND SHARE HTML*/
			$t=View::factory("modals/addStep2")
			->bind("id",$id)
			->bind("title",$title);

			$this->clientMessage=ClientMessage_Modal::factory(Controller_App_Video::$_messages["addStep2"], $t);


			//$this->clientMessage->targ=URL::base(true)."play/".$id;
		}
		else {
			//error saving video


		}
	}


	private static function _getStr($startPat, $endPat, $atom){
		$s=strpos($atom,$startPat)+strlen($startPat);
		$e=strpos($atom, $endPat,$s);
		return substr($atom, $s, $e-$s);

	}

	private static function _existsInDB($utlink) {
		$r=DB::query(Database::SELECT,"SELECT id FROM videos WHERE utlink LIKE ?; ")->bind("?",$utlink )->execute()->as_array();
		if (isset($r[0])) return true;
		return false;
	}

	private static function prepareLen($t) {

		$h=floor($t/3600);
		$m=floor(($t-3600*$h)/60);
		$s=floor($t-3600*$h-60*$m);
		$m=$h>1&&$m<10?"0".$m:$m;
		$s=$s<10?"0".$s:$s;
			
		If ($h>0) $h.=":";
		else $h="";
		return $h.$m.":".$s;
	}

private static function youtube_image($id) {
		$resolution = array (
				'sddefault',
        '0',
				'mqdefault',
				'hqdefault'
		);

		for ($x = 0; $x < sizeof($resolution); $x++) {
		if($x==1) $resolution[$x]='0';
			$url = 'http://img.youtube.com/vi/' . $id . '/' . $resolution[$x] . '.jpg';
			$h=get_headers($url);
			if ($h[0] == 'HTTP/1.0 200 OK') {
				break;
			}
		}
		return $resolution[$x];
	}

}
