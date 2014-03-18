<?php

Conf::set('adminMenu',array(
"-header-"=>array(__("Content"),""),
//"videos_list/"=>array(__("Videos"),"icon-film"),
"user_list/"=>array(__("Users"),"icon-user"),

"-header3"=>array(__("Front-end"),""),
"categories_list/"=>array(__("Categories"),"icon-th-list"),
"blocks_list/"=>array(__("Advertising"),"icon-cog"),
"texts_list/"=>array(__("Texts"),"icon-list-alt"),
//"seometas_list/"=>array(__("SEO options"),"icon-zoom-in"),

"-header2"=>array(__("Back-end"),""),
"config_list/"=>array(__("Site Configuration"),"icon-wrench"),
"admin/docs/"=>array(__("Documentation"),"icon-question-sign"),


));

	define ('LIST_ITEMS',15);

Conf::set("adminView","charisma-admin");
Conf::set("projectJS","js/admin.js");
Conf::set("paginationConfig",array(

	// Application defaults
		'current_page'      => array('source' => 'route', 'key' => 'page'), // source: "query_string" or "route"
		'items_per_page'    => LIST_ITEMS,
		'view'              => Conf::get("adminView").'/pagination/floating',
		'auto_hide'         => TRUE,
		'first_page_in_url' => FALSE,
	));


		function theme_get_forms_params() {
						 
				return array(
  		  "view" => new SideBySideBootstrap3 (50),
    "ajax" => 1,
	"ajaxCallback"=>"app.finishAction",
				//"resourcesPath"=>"plugins\PFBC\Resources\",
	"prevent"=>array("style","jQuery", "jQueryUI","jQueryUIButtons","focus" )


				);


			}

return array();