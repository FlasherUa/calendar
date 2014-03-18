<?php

class Controller_App_Texts extends Controller {
	
	public function action_popup () {
		$id=$this->request->param("id");
		$m=Model::factory("Texts")->articlebyId($id);
		if (!is_array($m))return;//err 
		 //$m=$m[0];
		 $this->clientMessage=ClientMessage_Modal::factory($m['Descr'],$m['Fulltext']);
		
	}
	
	public function action_view () {
		$id=$this->request->param("id");
		$m=Model::factory("Texts")->articlebyId($id);
		if (!is_array($m))return;//err
	
		define ("noRbar",true); 
		$this->_core=$m['Descr'].$m['Fulltext'];
	
	}
	
	
}