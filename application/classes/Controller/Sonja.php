<?php

class Controller_Sonja extends Controller {
	protected $id=1;
	
	
/*function before() {
	parent::before();
	/*If (!preg_match("/[^0-9]/", $this->request->action()))  {
		//only numbers - it is page 
		$this->request->_params["page"]= $this->request->action();
		$this->request->action("index");
	}*/
	//if ($this->request->controller()){}
	//SocialMetas::setList();
	
	/*if ( !Auth::instance()->logged_in('admin')) define ("adminIn", true);
	else define ("adminIn",false);
}	*/
	
	function action_index() {

	 $this->_core=View::factory("index");
	}


}
