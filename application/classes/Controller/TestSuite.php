<?php 



class Controller_TestSuite extends Controller {


	public function action_index() {

		$o= "<h3>UserInterface tests</h3><h5>DELETE application/classses/controller/TestSuite.php ON PRODUCTION!!</h5>";
		
		$ar=get_class_methods("Controller_TestSuite");
		
		$o.= "<Br><A  ' href='new/confirmed'  >User Confirmed Dialogue</a>";
		$o.= "<Br><A  ' onclick='napp.addStep3(1)'  >Add movie Step3 Modal Dialogue Window</a>";
		
		foreach ($ar as $a){
			if (strpos($a,"action_test")!==false){
				$act=substr($a, 11);
				$o.= "<Br><A  class='popup' href='testSuite/test$act'>".str_replace("_", " ", $act)."</a>";
			}
		}
		
		
		
		
		
		
		$this->_core=$o;
	}

	public function action_test_Add_Movie_Step1_Modal() {
		$r=DB::query(Database::SELECT,"SELECT * FROM videos limit 1")->execute()->current();

		$r=View::factory("modals/addStep1",$r);
		$this->clientMessage=ClientMessage_Modal::factory(Controller_App_Video::$_messages["addStep1"], $r, "save");
		$this->clientMessage->addButton ("Save&Continue","onEditSave");
	}

	
	public function action_test_Add_Movie_Step2_Modal() {
		$r=DB::query(Database::SELECT,"SELECT * FROM videos limit 1")->execute()->current();
		
		$r=View::factory("modals/addStep2",$r);
		$this->clientMessage=ClientMessage_Modal::factory(Controller_App_Video::$_messages["addStep2"], $r);
		
	}

	public function action_test_Social_Buttons_Bar1_Modal() {
			
		$this->_core=View::factory("social/buttonsbar")->set("href",Request::current()->url(true))->set("title","TITLE");



	}

	public function action_test_User_Email_check_AdminEmail() {
		$email=Conf::get("adminMail");
		
		$o=Controller_App_User::mail_registered($email);
		$this->clientMessage=ClientMessage_Modal::factory("Email test - check admin mail ", "errors are  here:". $o);
	}
	
	public function action_test_User_Register() {
		ob_end_clean();
		$email="test@example.com";///Conf::get("adminMail");
		$request=Request::factory("app_user/register");
		$request->post("email",$email);
		$request->post("pass","testuser");
		$responce=$request->execute();
		
		
		//del test user 
		$r=DB::delete("user")->and_where("email", "=", $email)->execute();
	
		echo $responce->send_headers(TRUE)->body();
		die();
	}
	
	
}