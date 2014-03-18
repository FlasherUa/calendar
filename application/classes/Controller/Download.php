<?php

class Controller_Download extends Controller {

	public function action_index()
	{
		$url=$this->request->param("param");
		$res= DB::query(Database::SELECT,
					'SELECT id,file FROM `objects` WHERE `url`=:url; ')->param(":url", myUrlDecode($url))->execute()->current();

		$update=DB::query(Database::UPDATE,
					'UPDATE `objects` SET `downloads`=`downloads`+1 WHERE `id`=:id; ')->bind(":id", $res['id'])->execute();
		$this->response->headers(array("Content-Type"=>"application/force-download","Cache-control"=>'no-cache', ));
		/*header ("Content-Type: application/force-download"); 
		header ("Content-Type: application/octet-stream"); 
		header ("Content-Type: application/download");
		*/
		$this->response->body(file_get_contents("images/".$res['file']));

	}

}