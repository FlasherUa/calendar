<?php


class Controller_Point extends Controller {
	
	function action_index() {
		$this->request->param("ext","json");
		$f=$this->request->param("id", 1);

		$ar=DB::query(Database::SELECT,"SELECT * FROM markers WHERE parent=:fac")
			->bind(":fac", $f)
			->execute()
			->as_array();

		$this->response->headers('Content-Type', 'application/json'); $out=json_encode($ar);
		$this->response->body($out);
	}


	
}