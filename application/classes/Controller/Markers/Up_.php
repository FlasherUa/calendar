<?php class Controller_Markers_Up extends  LsController {
	protected $t="up";
	protected $id;

	function before() {
		$this->id=$this->request->action();
		$this->request->action("index");
	}

	function action_index(){
		Model_Markers::reorder($this->id);
			}


	function reorder (){

	}
}