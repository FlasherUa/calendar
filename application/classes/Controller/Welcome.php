<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {
	/*get js templates
	 * mobile
	 * desctop
	 *
	 */
	public $template = 'index';


	public function action_index()
	{
		//$this->response->body('hello, worldddd!');
		$this->template->title = 'iphone wallpapers!';
		$this->template->main = 'main_first';
		$this->template->description = 'main_first';
		
		if (stristr($_SERVER['HTTP_USER_AGENT'],'iPhone')  || stristr($_SERVER['HTTP_USER_AGENT'],'iPod')
		|| stristr($_SERVER['HTTP_USER_AGENT'],'iPad') || stristr($_SERVER['HTTP_USER_AGENT'],'Android') ) {  
			HTTP::redirect("/m/index.html"); }
	}



	public function action_html()
	{
		/**
		 *
		 * predefined shortlinks 
		 * @var
		 */
		$url=$this->request->param("param");
		//convert .html to category or image view
		$url=$this->fixPage($url);


		/**
		 * init mobile OR desctop template pack
		 */

		if (stristr($_SERVER['HTTP_USER_AGENT'],'iPhone')  || stristr($_SERVER['HTTP_USER_AGENT'],'iPod')
		|| stristr($_SERVER['HTTP_USER_AGENT'],'iPad'))$this->request->_params["mobile"]=true;


		if ($this->request->param("mobile")){
			$mobile="mobile/";
			$this->template=View::factory("mobile/index");
		}
		else {
			$mobile="";
		}
		if (isset($_POST['json'])) $this->template=View::factory($mobile."json"); 
		
		$this->template->description ="";
		/**
		 * parse SHORTLINK
		 */
		if ($url){
			//print cat or image page
			$this->template->title = $url;
			$url=myUrlDecode($url);
			$res=Predefined::find($url);
			if (is_array($res))
			{
				if ($url=="index") {
					$this->template->main="main_first";
				} 	else {
				//define("NO_PAGINATION",true);
					$this->template->main="main_cat";
					$this->template->pagination=Pagination::factory();
					$res['result']=Model::factory("Items")->categories($res['where']);
				}
				//	$this->template->bind('arr', $res);
			}else
			/***
			 * SHORTLINK!!!
			 * find an  DB object for this shortlink
			 */
			{
				$res= DB::query(Database::SELECT,
					'SELECT * FROM `objects` WHERE `url` LIKE :url; ')->bind(":url", $url)->execute()->current();

				if ($res['type']=='cat')
				{
					$this->template->main="main_cat";
					$this->template->pagination=Pagination::factory();
				}
				else
				{

				 $this->template->main=$mobile."main_img";
				}


					
			}

			if (!$res){
				//err404 !!! TODO
			}else {
				$this->template->title=$res['title'];
				$this->template->description=$res['descr'];
				$this->template->bind('arr', $res);
			}

		}else {
			//index page
			$this->template->main=$mobile."main_first";
		}


	}


	public function action_tag()
	{
		//convert .html to category or image view
		$url=$this->request->param("param");
		$url=$this->fixPage($url);

		$mobile=$this->request->param("mobile")?"mobile/":"";

		//print cat  page
		$res['title']=$this->template->title = "Search tag #".$url;
		//$url=myUrlDecode($url);
		//find an object for this shortlink

		$res['where']= '`type` LIKE "img" AND `tags` LIKE "%'.addslashes($url).'%"';
		$res['descr']='';
		$res['tags']='';
		$res['file']='';
		$this->template->main=$mobile."main_cat";
		$this->template->pagination=Pagination::factory();

		$this->template->bind('arr', $res);
		if (!$res){
			//err404 !!! TODO
		}


		$this->template->description ="";
	}

	private function fixPage($url) {
		/*FIX FOR PAGE ROUTE*/
		if (strpos($url,"-page-")) {

			preg_match("/(.*)-page-([\d]+)/", $url, $r);
			$url=$this->request->_params["param"]= $r[1];
			$this->request->_params["page"]= $r[2] ;
		}
		return $url;
	}




} // End Welcome

