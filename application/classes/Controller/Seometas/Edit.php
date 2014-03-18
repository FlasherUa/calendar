<?php class Controller_Seometas_Edit extends  LsController {
 public $classID='anwn' ;
 public $object='seometas' ;
 public $action='edit' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Edit',
  'actType' => 'form',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'true',
  'selectBefore' => 'true',
  'ajaxTargt' => 'main',
  'key' => 'edit',
  'id' => 'anwn',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'param' => '',
  'menuType' => 'toOne',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
  'nameEN' => 'Edit',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'edit',
    'return' => 'message',
    'id' => 'bVe',
    'parent' => 'Standart',
  ),
  2 => 
  array (
    'name' => 'initObject',
    'parent' => NULL,
  ),
  3 => 
  array (
    'name' => 'loadBlockClient',
    'return' => 'next',
    'id' => 'bWG',
    'parent' => 'remoteClient',
  ),
  4 => 
  array (
    'name' => 'perpareRequest',
    'parent' => NULL,
  ),
  5 => 
  array (
    'name' => 'loadClient',
    'return' => 'next',
    'id' => 'bUq',
    'parent' => 'remoteClient',
  ),
  6 => 
  array (
    'name' => 'select',
    'return' => 'data',
    'id' => 'bVy',
    'parent' => 'SQL',
  ),
  7 => 
  array (
    'name' => 'beforeSelect',
    'parent' => NULL,
  ),
  8 => 
  array (
    'name' => 'prepareSelectSQL',
    'parent' => NULL,
  ),
  9 => 
  array (
    'name' => 'sqlGO',
    'return' => 'data',
    'id' => 'bVG',
    'parent' => 'SQLext',
  ),
  10 => 
  array (
    'name' => 'initDB',
    'parent' => NULL,
  ),
  11 => 
  array (
    'name' => 'sqlGOO',
    'parent' => NULL,
  ),
  12 => 
  array (
    'name' => 'afterSelect',
    'parent' => NULL,
  ),
  13 => 
  array (
    'name' => 'prepareForDisplay',
    'parent' => NULL,
  ),
  14 => 
  array (
    'name' => 'beforeEdit',
    'return' => 'next',
    'id' => 'bVt',
    'parent' => 'Data',
  ),
  15 => 
  array (
    'name' => 'setEditFlag',
    'parent' => NULL,
  ),
  16 => 
  array (
    'name' => 'form',
    'return' => 'next',
    'id' => 'bVQ',
    'parent' => 'Client',
  ),
  17 => 
  array (
    'name' => 'initLang',
    'return' => 'next',
    'id' => 'bWJ',
    'parent' => 'funcs_nopakadge',
  ),
  18 => 
  array (
    'name' => 'initForm',
    'return' => 'next',
    'id' => 'bWI',
    'parent' => 'Client',
  ),
  19 => 
  array (
    'name' => 'locClientResetForm',
    'return' => 'next',
    'id' => 'bUf',
    'parent' => 'locClient',
  ),
  20 => 
  array (
    'name' => 'locClientInitForm',
    'return' => 'next',
    'id' => 'bWL',
    'parent' => 'locClient',
  ),
  21 => 
  array (
    'name' => 'remoteClientInitForm',
    'return' => 'next',
    'id' => 'bUp',
    'parent' => 'remoteClient',
  ),
  22 => 
  array (
    'name' => 'viewForm',
    'return' => 'next',
    'id' => 'bWK',
    'parent' => 'Client',
  ),
  23 => 
  array (
    'name' => 'locClientHTMLfinished',
    'return' => 'next',
    'id' => 'bWW',
    'parent' => 'locClient',
  ),
  24 => 
  array (
    'name' => 'userAsk',
    'return' => 'userAsk',
    'id' => 'bUr',
    'parent' => 'Client',
  ),
  25 => 
  array (
    'name' => 'setEditFlag',
    'parent' => NULL,
  ),
  26 => 
  array (
    'name' => 'validateAndSave',
    'return' => 'data',
    'id' => 'bVs',
    'parent' => 'Data',
  ),
  27 => 
  array (
    'name' => 'validateClient',
    'return' => 'next',
    'id' => 'bWN',
    'parent' => 'funcs_nopakadge',
  ),
  28 => 
  array (
    'name' => 'validateServer',
    'return' => 'next',
    'id' => 'bVv',
    'parent' => 'Data',
  ),
  29 => 
  array (
    'name' => 'ifGo',
    'return' => 'next',
    'id' => 'bVi',
    'parent' => 'Control',
    'params' => 
    array (
      'true' => 'label_save',
      'false' => 'label_err',
    ),
  ),
  30 => 
  array (
    'name' => 'label_err',
    'parent' => NULL,
  ),
  31 => 
  array (
    'name' => 'ClientShowErrors',
    'parent' => NULL,
  ),
  32 => 
  array (
    'name' => 'stop',
    'return' => 'next',
    'id' => 'bVl',
    'parent' => 'Control',
  ),
  33 => 
  array (
    'name' => 'label_save',
    'parent' => NULL,
  ),
  34 => 
  array (
    'name' => 'locClientResetForm',
    'return' => 'next',
    'id' => 'bUf',
    'parent' => 'locClient',
  ),
  35 => 
  array (
    'name' => 'save',
    'return' => 'message',
    'id' => 'bVD',
    'parent' => 'SQLext',
  ),
  36 => 
  array (
    'name' => 'beforeSave',
    'return' => 'next',
    'id' => 'bVC',
    'parent' => 'SQLext',
  ),
  37 => 
  array (
    'name' => 'prepareSaveSQL',
    'return' => 'next',
    'id' => 'bVE',
    'parent' => 'SQLext',
  ),
  38 => 
  array (
    'name' => 'checkPermission',
    'parent' => NULL,
  ),
  39 => 
  array (
    'name' => 'doSaveSQL',
    'parent' => NULL,
  ),
  40 => 
  array (
    'name' => 'afterSave',
    'parent' => NULL,
  ),
  41 => 
  array (
    'name' => 'afterEdit',
    'parent' => NULL,
  ),
  42 => 
  array (
    'name' => 'doNextAction1',
    'parent' => NULL,
  ),
) ;
function initObject($params){
  
 //$vals['!sqlName']=@$arr['Description']
 
  
}
function select($params){
 $this->sql=new Sql();//$sql=&$this->sql;$sql=array (
  'fields' => 'A.id , A.link , A.title , A.Description ',
  'from' => 'seometas A ',
  'where' => NULL,
  'order' => NULL,
); 
 



 
 $this->sql->query=$sql; 
}
function prepareForDisplay($params){
  
 /* @$arr['Description']=unhtmlspecialchars(@$arr['Description']); */
 
  
}
function beforeEdit($params){
 $this->arr=$this->data['result']->next();/* If has owner -   if isset (arr{owner]) - if owner==user id  $arr['owner']='owner' hide owner value? show class='owner' in template */ 
  
  
}
function initLang($params){
 /*initLang  for object operations*/ 
 $lang["id"]["Title"]="Id";//old$lang["id"]["Hint"]="";//old$lang["id"]["Value"]="Id"; $or["id"] =" OR tID='anwt' ";
$lang["link"]["Title"]="Link";//old$lang["link"]["Hint"]="Realtive URI without  start or  end slashes. <i> eg sell/apple</i>";//old$lang["link"]["Value"]="Link"."<hint>".$lang["link"]["Hint"]."</hint>"; $or["link"] =" OR tID='anwy' ";
$lang["title"]["Title"]="Title";//old$lang["title"]["Hint"]="";//old$lang["title"]["Value"]="Title"; $or["title"] =" OR tID='anuf' ";
$lang["Description"]["Title"]="Description";//old$lang["Description"]["Hint"]="";//old$lang["Description"]["Value"]="Description"; $or["Description"] =" OR tID='anun' ";
 
 global $config;//$sql="SELECT * FROM `_langs` WHERE `Lang`='".$config['lang']."'  AND ( 0 ".implode ("", $or).");";$this->data['lang']=$lang; 
}
function locClientInitForm($params){
 //if ($this->request['_call']['client']!="local") return;/* FOR use PFBC */ //include_once sd.'controller/clients/formsAdaptor.php';$form= new myForm( $this->tID."_f"  );global $config;$form->configure(theme_get_forms_params());$form->configure(array("action"=> $this->object."_".$this->action."/".$this->id));//$form->addElement(new Element_Hidden("tID", $this->atrs['id']));$form->addElement(new Element_Hidden("step", '<%arr:step%>'));//$form->addElement(new Element_Hidden("id", $this->id));//$client=$this->request['_call']['client'];//$form->addElement(new Element_Hidden("client", $client ));$form->addElement(new Element_Hidden("dataType", "json" ));$lang=$this->data['lang'];/*form data init */if (isset($this->data['result'])) {$arr=@$this->data['result']->as_array();$arr=$arr[0]; }if (isset ($this->data['defaults']) && is_array ($this->data['defaults'])){	if (is_array ($arr)) $arr=@array_merge( $this->data['defaults'], $arr);	else $arr=$this->data['defaults']; }   /*now comes elements*/ 
 $form->addElement(new Element_Hidden( "id",     @$arr['id'] )); 
$form->addElement(new Element_Textbox($lang['link']['Value'], "link", array(    "value" => @$arr['link'] ))); 
$form->addElement(new Element_Textbox($lang['title']['Value'], "title", array(    "value" => @$arr['title'] ,"required" => 1))); 
 $options=" "; $form->addElement(new Element_TinyMCE($lang["Description"]["Value"], "Description", array(    "value" => @$arr['Description'], "options"=>$options)));  
 
 /*finish form*/$form->closeFieldset();if(!isset($removeSubmitButton) || !$removeSubmitButton) {$form->addElement(new Element_Button("<i class='icon-ok'></i> ".__("Submit"),"submit", array('class'=>'btn btn-primary', 'hasCancel'=>__("Cancel") )));}$this->data['form']=$form;$this->data['responce']['html']=$form->render(true); 
}
function remoteClientInitForm($params){
 /*add contr ['data] [arr] values to output   */ 
  
  
}
function locClientHTMLfinished($params){
 /*add contr ['data] [arr] values to output   */ 
  
  
}
function validateClient($params){
  
 
 $validator["title"]="regexp"; 

 
  
}
function validateServer($params){
 $validator=new FormValidator();//global $config;//ls_include (sd."lang/".(san_action($config['lang']))."/validate.php"); 
 
 $validator->addValidation("title","req" ); 

 
 if($validator->ValidateForm($this->request->post())){				//ok validated!!	$this->data['if']="true";//set flag for controll struct			} else {				$this->error ( $validator->GetErrors(),'validate');				$this->data['if']="false";//set flag for controll struct//$this->state="error";} 
}
function beforeSave($params){
 /* put data into save values*/$raw=$this->request->post();//$this->id=$raw['id']; 
  if (isset($raw["id"])) $ready["seometas"]["id"]["value"]=$raw["id"]; 
 if (isset($raw["link"])) $ready["seometas"]["link"]["value"]=$raw["link"]; 
 if (isset($raw["title"])) $ready["seometas"]["title"]["value"]=$raw["title"]; 
 if (isset($raw["Description"])) $ready["seometas"]["Description"]["value"]=$raw["Description"]; 
 
 $this->data['ready']=$ready; 
}}