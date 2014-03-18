<?php



Class Controller_App_Stats extends Controller{
	/**
	 *
	 * Adss 1 view to movie count, returns true if ok
	 */
	public function action_view(){

		if($this->go("views")) $this->response->body(true);
	}

	public function action_comment(){
		if($this->go("comments")) $this->response->body(true);
	}


	public	function action_rate() {
		$id=$this->request->post("id");
		$rate=intval($this->request->post("rate"));
		if ($rate>1||$rate<-1) return;
		$query = DB::update('videos')
		//->set(array("rateSum" => DB::expr('`rateSum` + '.$rate)))
		->set(array("rates" => DB::expr('`rates` + '.(Integer)$rate)))
		->where('id', '=', $id);
		
		if($query->execute())  {
		/*$r=DB::query(Database::SELECT, "SELECT rateSum, rates, id FROM videos WHERE id =?")->bind("?", $id)
		->execute()->as_array();
			$cm=new ClientMessage();
			$cm->r="replace";
			$cm->targ="#stars".$id;
			$cm->m=View::factory("Forms/RatingStars",$r[0]);
			$cm->im=false;
			$cm->event="ratingUpdated";
			$this->response->body($cm->render());
			*/
			$this->response->body($rate);
		}
		
	}



	private  function go($field){
		$id=$this->request->param("id");
		$query = DB::update('videos')->set(array($field => DB::expr('`'.$field.'` + 1')))->where('id', '=', $id);
		return $query->execute();

	}
	/**
	 *
	 * Stores user action to session
	 * @param video ID  $id
	 * @param view or rate $type
	 */
	private	function store($id, $type) {
		//if($this->go("comments")) $this->response->body(true);
	}

}
