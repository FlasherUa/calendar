<?php

class Controller_Route extends Controller {
	
	function action_index() {
		$this->request->param("ext","json");
		$f=$this->request->param("id", 1);

		$ar=DB::query(Database::SELECT,"SELECT * FROM markers WHERE parent=:fac ORDER BY ordr")
			->bind(":fac", $f)
			->execute()
			->as_array();

		$this->response->headers('Content-Type', 'application/json'); $out=json_encode($ar);
		$this->response->body($out);
	}

	function action_marker() { 
	//	$this->request->param("ext","json");
		$f=$this->request->param("id");
		//dd ($this->request); 
		$ar=DB::query(Database::SELECT,"SELECT * FROM markers WHERE id=:fac")
			->bind(":fac", $f)
			->execute()
			->as_array();

		$this->response->headers('Content-Type', 'application/json'); $out=json_encode($ar[0]);
		$this->response->body($out);
	}
	
	
	public static function reorder ($id=1) {
		$sql="Update markers SET `ordr`=`id` WHERE `ordr`=0;";
		DB::query(Database::UPDATE, $sql)->execute();
		
		$sql="Select id FROM markers WHERE parent=:id";
		$arr=DB::query(Database::SELECT, $sql)->bind(":id", $id)->execute();
		foreach ($arr as $a){
			d($a);
		}
		
	}
	
}