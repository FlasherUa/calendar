<?php class Controller_Seometas_Add extends  LsController {
 public $classID='anwm' ;
 public $object='seometas' ;
 public $action='add' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Add',
  'actType' => 'form',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'false',
  'selectBefore' => 'true',
  'ajaxTargt' => 'main',
  'key' => 'add',
  'id' => 'anwm',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'param' => '',
  'menuType' => 'standAlone',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
  'nameEN' => 'Add',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'add',
    'return' => 'message',
    'id' => 'bVd',
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
    'name' => 'beforeAdd',
    'parent' => NULL,
  ),
  7 => 
  array (
    'name' => 'form',
    'return' => 'next',
    'id' => 'bVQ',
    'parent' => 'Client',
  ),
  8 => 
  array (
    'name' => 'initLang',
    'return' => 'next',
    'id' => 'bWJ',
    'parent' => 'funcs_nopakadge',
  ),
  9 => 
  array (
    'name' => 'initForm',
    'return' => 'next',
    'id' => 'bWI',
    'parent' => 'Client',
  ),
  10 => 
  array (
    'name' => 'locClientResetForm',
    'return' => 'next',
    'id' => 'bUf',
    'parent' => 'locClient',
  ),
  11 => 
  array (
    'name' => 'locClientInitForm',
    'return' => 'next',
    'id' => 'bWL',
    'parent' => 'locClient',
  ),
  12 => 
  array (
    'name' => 'remoteClientInitForm',
    'return' => 'next',
    'id' => 'bUp',
    'parent' => 'remoteClient',
  ),
  13 => 
  array (
    'name' => 'viewForm',
    'return' => 'next',
    'id' => 'bWK',
    'parent' => 'Client',
  ),
  14 => 
  array (
    'name' => 'locClientHTMLfinished',
    'return' => 'next',
    'id' => 'bWW',
    'parent' => 'locClient',
  ),
  15 => 
  array (
    'name' => 'userAsk',
    'return' => 'userAsk',
    'id' => 'bUr',
    'parent' => 'Client',
  ),
  16 => 
  array (
    'name' => 'setInsertFlag',
    'return' => 'next',
    'id' => 'bVI',
    'parent' => 'SQLext',
  ),
  17 => 
  array (
    'name' => 'validateAndSave',
    'return' => 'data',
    'id' => 'bVs',
    'parent' => 'Data',
  ),
  18 => 
  array (
    'name' => 'validateClient',
    'return' => 'next',
    'id' => 'bWN',
    'parent' => 'funcs_nopakadge',
  ),
  19 => 
  array (
    'name' => 'validateServer',
    'return' => 'next',
    'id' => 'bVv',
    'parent' => 'Data',
  ),
  20 => 
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
  21 => 
  array (
    'name' => 'label_err',
    'parent' => NULL,
  ),
  22 => 
  array (
    'name' => 'ClientShowErrors',
    'parent' => NULL,
  ),
  23 => 
  array (
    'name' => 'stop',
    'return' => 'next',
    'id' => 'bVl',
    'parent' => 'Control',
  ),
  24 => 
  array (
    'name' => 'label_save',
    'parent' => NULL,
  ),
  25 => 
  array (
    'name' => 'locClientResetForm',
    'return' => 'next',
    'id' => 'bUf',
    'parent' => 'locClient',
  ),
  26 => 
  array (
    'name' => 'save',
    'return' => 'message',
    'id' => 'bVD',
    'parent' => 'SQLext',
  ),
  27 => 
  array (
    'name' => 'beforeSave',
    'return' => 'next',
    'id' => 'bVC',
    'parent' => 'SQLext',
  ),
  28 => 
  array (
    'name' => 'prepareSaveSQL',
    'return' => 'next',
    'id' => 'bVE',
    'parent' => 'SQLext',
  ),
  29 => 
  array (
    'name' => 'checkPermission',
    'parent' => NULL,
  ),
  30 => 
  array (
    'name' => 'doSaveSQL',
    'parent' => NULL,
  ),
  31 => 
  array (
    'name' => 'afterSave',
    'parent' => NULL,
  ),
  32 => 
  array (
    'name' => 'afterAdd',
    'parent' => NULL,
  ),
  33 => 
  array (
    'name' => 'doNextAction1',
    'parent' => NULL,
  ),
) ;
function initObject($params){
  
 //$vals['!sqlName']=@$arr['Description']
 
  
}
function initLang($params){
 /*initLang  for object operations*/ 
 $lang["link"]["Title"]="Link";//old$lang["link"]["Hint"]="Realtive URI without  start or  end slashes. <i> eg sell/apple</i>";//old$lang["link"]["Value"]="Link"."<hint>".$lang["link"]["Hint"]."</hint>"; $or["link"] =" OR tID='anwy' ";
$lang["title"]["Title"]="Title";//old$lang["title"]["Hint"]="";//old$lang["title"]["Value"]="Title"; $or["title"] =" OR tID='anuf' ";
$lang["Description"]["Title"]="Description";//old$lang["Description"]["Hint"]="";//old$lang["Description"]["Value"]="Description"; $or["Description"] =" OR tID='anun' ";
 
 global $config;//$sql="SELECT * FROM `_langs` WHERE `Lang`='".$config['lang']."'  AND ( 0 ".implode ("", $or).");";$this->data['lang']=$lang; 
}
function locClientInitForm($params){
 //if ($this->request['_call']['client']!="local") return;/* FOR use PFBC */ //include_once sd.'controller/clients/formsAdaptor.php';$form= new myForm( $this->tID."_f"  );global $config;$form->configure(theme_get_forms_params());$form->configure(array("action"=> $this->object."_".$this->action."/".$this->id));//$form->addElement(new Element_Hidden("tID", $this->atrs['id']));$form->addElement(new Element_Hidden("step", '<%arr:step%>'));//$form->addElement(new Element_Hidden("id", $this->id));//$client=$this->request['_call']['client'];//$form->addElement(new Element_Hidden("client", $client ));$form->addElement(new Element_Hidden("dataType", "json" ));$lang=$this->data['lang'];/*form data init */if (isset($this->data['result'])) {$arr=@$this->data['result']->as_array();$arr=$arr[0]; }if (isset ($this->data['defaults']) && is_array ($this->data['defaults'])){	if (is_array ($arr)) $arr=@array_merge( $this->data['defaults'], $arr);	else $arr=$this->data['defaults']; }   /*now comes elements*/ 
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
  if (isset($raw["link"])) $ready["seometas"]["link"]["value"]=$raw["link"]; 
 if (isset($raw["title"])) $ready["seometas"]["title"]["value"]=$raw["title"]; 
 if (isset($raw["Description"])) $ready["seometas"]["Description"]["value"]=$raw["Description"]; 
 
 $this->data['ready']=$ready; 
}}