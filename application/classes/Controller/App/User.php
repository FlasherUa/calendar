<?php

Class Controller_App_User extends Controller{
	private $_email;
	private $_pass;
	//private static const FaceBookAppId=""; stored in DB config
	private  static $FaceBookAppSecret="f12751555f31266338d767a1af5ca0d0";
	private static $_registered=false;//event on register =true
	public static $_messages=array(
			1=>'<span class="glyphicon glyphicon-question-sign"></span> User is not found or password is wrong',
			2=>'<span class="big glyphicon glyphicon-user"></span> Your account is not confirmed. Please check your email for instructions',
			3=>'<span class="glyphicon glyphicon-user"></span >User already exists',
			4=>'<span class="glyphicon glyphicon-user"></span >Please login',
			"registeredTitle"=>"Thanks for registering! Youre one step closer to become a vidpitter...",
			"confirmedTitle"=>"Your user is now confirmed! Welcome to the VidPit Virolution!",
			"confirmedButtons"=>"Your user is now confirmed! Welcome to the VidPit Virolution!",
			"suspended"=>"Your account  is suspended! Please contact administrator",

			'email_registered'=>"Thanks for registration!"
	);
	private static $code;



	public function action_login(){
		$this->_vals();
		$email=$this->_email;
		$pass=$this->_pass;

		$q=DB::select("A.id","nick","confirmed","Suspended")
		->from(array("user", "A"))
		//->join (array("user_detailes","B"))->on("A.id","=","B.id")
		->where("nick","LIKE", $email)
		->and_where("pswd","LIKE", DB::expr('MD5("&ui7&gcKL'.$pass.')(djk(*@%66f")'));
		//d($q->compile());
		$r=$q->execute()->as_array();
		/*do login*/
		if (isset($r[0])) {
			if ($r[0]['Suspended']=="yes") {
				$this->clientMessage=ClientMessage_Error::factory("#lnForm", self::$_messages['suspended']);
				return;
			}

			if ($r[0]['confirmed']=="yes") {	//$this->logIn($r[0]['id']); //user ok, login

				Session::instance()->set('userConfirmed', true);

			}
			else {//email not confirmed
				//sleep(5);
				$cm=array ("e"=>"err",
						"m"=>self::$_messages[2],
						"targ"=>"#lnForm");
				$this->clientMessage=ClientMessage::factory($cm);

			}

			$this->logIn($r[0]['id']);

		}
		else {
			/*Suer not found
			 * return error
			* */
			sleep(5);
			$cm=array ("e"=>"err",
					"m"=>self::$_messages[1],
					"targ"=>"#lnForm");
			$this->clientMessage=ClientMessage::factory($cm);
		}
	}

	public function action_register(){
		$this->_vals();
		Session::instance()->set("email",$this->_email);
		Session::instance()->set("pass",$this->_pass);
		$email=$this->_email;
		
		/*check if exists*/
		$q=DB::select("A.id","nick")
		->from(array("user", "A"))
		//->join (array("user_detailes","B"))->on("A.id","=","B.id")
		->where("nick","LIKE", $email);
		//->and_where("pswd","LIKE", DB::expr('MD5("&ui7&gcKL'.$pass.')(djk(*@%66f")'));
		
		$r=$q->execute()->as_array();
		if (isset($r[0])) {
			//such user already exixsts
			$this->clientMessage=ClientMessage_Error::factory("#lnForm", self::$_messages[3]);
			return;
		}
		
		
		$v=View::factory("modals/user_registered")
		->bind("email", $email)->render();
		$clientMessage=ClientMessage_Modal::factory(self::$_messages["registeredTitle"], $v,"Apply");
		$clientMessage->addButton ("Apply","onRegister2Apply");


		$this->clientMessage=&$clientMessage;
	}

	public function action_register2(){

		$email=	Session::instance()->get("email");
		$pass=Session::instance()->get("pass");
		$fbid=Session::instance()->get("fbid","");
		$subscribed=$this->request->post("sub")=="true"?"yes":"no";

		$q=DB::select("A.id","nick")
		->from(array("user", "A"))
		//->join (array("user_detailes","B"))->on("A.id","=","B.id")
		->where("nick","LIKE", $email);
		//->and_where("pswd","LIKE", DB::expr('MD5("&ui7&gcKL'.$pass.')(djk(*@%66f")'));

		$r=$q->execute()->as_array();
		if (isset($r[0])) {
			//such user already exixsts
			$this->clientMessage=ClientMessage_Error::factory("#lnForm", self::$_messages[3]);
			return;
		}
		$code=substr(md5(rand()*32876876878), 2,18).substr(md5(rand().time()."OIUOIUOsc"),1,14);
		self::$code=$code;
		//Now register
		$q=DB::insert("user",array("nick", "email","pswd","code","fbid","subscribed"))
		->values(array($email,$email,DB::expr('MD5("&ui7&gcKL'.$pass.')(djk(*@%66f")')
				,md5($code), $fbid,$subscribed ));
		//d($q->compile());
		$r=$q->execute();
		Session::instance()->set("nuser", $r[0]);

		self::$_registered=true;
		$this->logIn($r[0]);//will setup $this->clientMessage
		$clientMessage0=$this->clientMessage;
		//	if (Request::$current->post("sub")=="true") $clientMessage=$this->action_subscribe();
		//else {
		$m="Thanks for registering!<br> Please check your email for confirmation.";
		$m= View::factory("modals/smallTvMessage")->set ("message", $m)->render();
		$cm=array("m"=>$m,
				"p"=>"Thanks!",
				"r"=>"modal");

		$clientMessage=ClientMessage::factory($cm);

		//}
		//mail
		$this->mail_registered ($email);


		$clientMessage->addSync($clientMessage0);
		$this->clientMessage=$clientMessage;
	}

	public static function mail_registered ($email) {


		//$draft=Model::factory("General")->getRaw(4,"Title,Descr");
		//$arr=array(":URL"=>URL::base(true)."app_user/confirm/".self::$code);
		$code=URL::base(true)."app_user/confirm/".self::$code;
		$t=View::factory("emails/registered")->bind("URLcode", $code)->render();
		$arr=array(":URL"=>URL::base(true)."app_user/confirm/".self::$code);
		//$t=strtr($draft['Descr'],$arr);
		$s=self::$_messages['email_registered'];
		$r=Email::send($email,$email, Conf::get("adminMail"), Conf::get("fromName"),
				$s, $t,
				URL::base());
		//dd($r);
	}
	/**
	 * confirm user
	 */
	public function action_confirm() {
		$code=$this->request->param("id");



		$r=DB::update("user")
		->set(array("confirmed"=>"yes"))
		->set(array("code"=>""))
		->where ("code","=",md5($code))
		->where ("confirmed","=","no")
		->execute();
		if ($r) {
			Session::instance()->set('userConfirmed', true);
			HTTP::redirect("New/Confirmed");

		}
		$this->response->body("Wrong confirmation code!");
	}


	public function action_logOut(){
		Session::instance()->destroy();
		//Session::instance()->delete("nuser");
		HTTP::redirect();
	}


	private function logIn($id){
		Session::instance()->bind("nuser", $id);

		$cm=array ("r"=>"replace",
				"m"=>View::factory("userBlock/addMovie")->bind("newlyRegistered", self::$_registered)->render(),
				"targ"=>"#loginBlock");


		//if (self::$_registered)$cm["m"].=View::factory("userBlock/justRegistered")->render();

		$this->clientMessage=ClientMessage::factory($cm);


	}


	private function _vals(){
		$email=$this->request->post("email");
		$pass=$this->request->post("pass");
		if (strlen($email)<6 || strlen($pass)<6 ) {
			$this->clientMessage= ClientMessage_Error::factory("#lnForm", "Password or email is too short");

		}
		$pass=self::_salt($pass);
		$this->_pass=$pass;
		$this->_email=$email;
	}

	public function action_FBlogin(){

		include_once libraryPath.'extras/FaceBook-php-SDK/facebook.php';

		$facebook = new Facebook(array(
				'appId'  => Conf::get('fbID'),
				'secret' => self::$FaceBookAppSecret,
		));

		// See if there is a user from a cookie
		$user = $facebook->getUser();

		if ($user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
				$this->_fb_login ($user_profile);
			} catch (FacebookApiException $e) {
				echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
				$user = null;
			}
			/*
			 * array
			'id' => string '100003920293423' (length=15)
			'name' => string 'Anatoly  Scherbina' (length=18)
			'first_name' => string 'Anatoly' (length=7)
			'last_name' => string 'Scherbina' (length=9)
			'link' => string 'https://www.facebook.com/anatoly.scherbina.1' (length=44)
			'username' => string 'anatoly.scherbina.1' (length=19)
			'gender' => string 'male' (length=4)
			'email' => string 'arserel@fm.com.ua' (length=17)
			'timezone' => int 2
			'locale' => string 'ru_RU' (length=5)
			'verified' => boolean true
			'updated_time' => string '2013-11-19T22:30:02+0000' (length=24)
			*
			*
			*/

			/* 1. try to login with data
			 * 2. if no will register
			* 2.1 If email exists, add FB ID there
			* 2.2. if not, register without pass
			*
			* so there is a possibility if you left your pass and email is the same as FB email, to login with FB
			*/
		}

	}
	/*
	 * subscibe to email newslist
	*
	*/
	public function action_subscribe () {


		return $this->clientMessage=self::_subscribe("yes");

	}

	public function action_unsubscribe () {
		$this->clientMessage=self::_subscribe("no");


	}

	private static function _subscribe ($yn="yes") {
		$r=DB::update("user")
		->set(array("subscribed"=>$yn))
		->where ("id","=",Session::instance()->get("nuser"))
		->execute();
		if ($r&&$yn=="yes") {

			$m="Thanks for subscribing to our newsfeed!<br> Please check your email for confirmation.";
			$m= View::factory("modals/smallTvMessage")->set ("message", $m)->render();

			$cm=array("m"=>$m,
					"p"=>"Subscribed!",
					"r"=>"modal",
					"im"=>false	);
		}else {
			$m="Sorry for unsubscribing from our newsfeed. <br> Hope you will think it over and subscribe again!";
			$m= View::factory("modals/smallTvMessage")->set ("message", $m)->render();

			$cm=array("m"=>$m,
					"p"=>"Unsubscribed!",
					"r"=>"modal");
		}
		return ClientMessage::factory($cm);
	}

	private function	_fb_login ($user_profile){

		$q=DB::select("id","nick",'confirmed',"Suspended")
		->from("user")
		->where("fbid","=", $user_profile['id']);
		$r=$q->execute()->as_array();

		if (isset($r[0])) {
			if ($r[0]['confirmed']=="yes") {	//$this->logIn($r[0]['id']); //user ok, login

				Session::instance()->set('userConfirmed', true);

					

			}
			//check if not suspeneded
			if ($r[0]['Suspended']!="yes")$this->logIn($r[0]['id']);


		}
		else {
			//register user
			$q=DB::select("id","nick")
			->from("user")
			->where("email","=", $user_profile['email']);
			$r=$q->execute()->as_array();

			if (isset($r[0])) {
				//Email exists just add FBID
				DB::update("user")
				->value("fbid", $user_profile['id'])
				//->value("confirmed", "yes")
				->where("id","=", $r[0]['id']);
				$this->logIn($r[0]['id']);
			}else {
				//email not exists, register new user
				//Now register
				/*	$q=DB::insert("user",array("nick", "email","fbid","confirmed"))
				->values(
						array(
								$user_profile['email'],
								$user_profile['email'],
								$user_profile['id'],
								"no"
						)
				);
				//	d($q->compile());*/
				$this->_email=$user_profile['email'];
				Session::instance()->set('fbid', $user_profile['id']);
				Session::instance()->set("email",$user_profile['email']);
				Session::instance()->set("pass",rand(0, 10000000));
				$email=$this->_email;

				$v=View::factory("modals/user_registered")
				->bind("email", $email)->render();
				$clientMessage=ClientMessage_Modal::factory(self::$_messages["registeredTitle"], $v,"Apply");
				$clientMessage->addButton ("Apply","onRegister2Apply");


				$this->clientMessage=&$clientMessage;


			}
			//$this->logIn($r[0]['id']);
		}


	}
	/**
	 *
	 * returns HTML add video block
	 */
	private function loggedSuccess() {


	}

	private static function _salt($pass) {
		return hash("sha256", $pass."(*I&(*&^hkjhHI".$pass."jkjasdhkjT&%$#%$#%$@$#SA^^DIUHo876".$pass."(&^%hjkjhQP{}");
	}



	public function action_restorePasswordStep1 () {
		$v=View::factory("modals/user_restorePasswordStep1")
		->render();
		$clientMessage=ClientMessage_Modal::factory("Restore Password Step 1", $v,"Apply");
		$clientMessage->addButton ("Send","onRestorePasswordStep2Apply");
		$this->clientMessage=$clientMessage;
	}

	public function action_restorePasswordStep2 () {

		/*find email
		 * if no - error
	 * if yes - create new pass, create code2=new pass hash
	 *
	 * send pass, code2  to email code =
	 *
	 * i=user_id&c=md5(code2)
	 *
	 * step3 find i , c
	 *
	 */
		$email=Request::current()->post('email');
		$q=DB::select("id","nick")
		->from("user")
		->where("email","=", $email );
		$r=$q->execute()->as_array();
		if (!isset($r[0])) {
			/*EMAIL not exists*/
			$v="No such email in database";
		}else {

			$pass=substr (md5(rand(0,100000).$email."(*&%*&^&^&"), 5,8);
			$code2=md5(rand(0,1000000).time());
			$link=URL::base(true)."app_user/restorePasswordStep3.html?i=".$r[0]['id']."&c=".$code2;
			$pass2 =self::_salt($pass);

			DB::update("user")
			->value("code2", $code2)
			->value("code", DB::expr('MD5("&ui7&gcKL'.$pass2.')(djk(*@%66f")'))
			->where("id","=", $r[0]['id'])
			->execute();


			$mailText=View::factory("emails/user_restorePasswordStep2")
			->bind ("pass",$pass)->bind("link",$link)
			->render();
			/*MAIL*/

			$s="Your Password Recovery";
			$r=Email::send($email,$email, Conf::get("adminMail"), Conf::get("fromName"),
					$s, $mailText,
					URL::base());

			/*MODAL*/
			$v=View::factory("modals/user_restorePasswordStep2")
			->render();
		}




		$clientMessage=ClientMessage_Modal::factory("Restore Password Step 2", $v, "Close");
		//	$clientMessage->addButton ("Send","onRestorePasswordStep2Apply");
		$this->clientMessage=$clientMessage;
	}

	function action_restorePasswordStep3 () {

		$id=$_GET['i'];
		$code2=$_GET['c'];
		//	$code2=$code2;
		$r=DB::update("user")
		->value("pswd", DB::expr("`code`"))
		->value("code2", "")
		->value("code", "")
		->where("id","=", $id)
		->where ("code2", "=", $code2);
		$sql=$r->compile();
		$r=$r->execute();
		if ($r) {

			HTTP::redirect("new/confirmRestore");
		}
	}
}
