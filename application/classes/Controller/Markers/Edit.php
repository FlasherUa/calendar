<?php class Controller_Markers_Edit extends  LsController {
 public $classID='amus' ;
 public $object='markers' ;
 public $action='edit' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Edit',
  'actType' => 'form',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'true',
  'selectBefore' => 'true',
  'usesuspended' => 'true',
  'key' => 'edit',
  'id' => 'amus',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'param' => '',
  'menuType' => 'toOne',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
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
  
 //$vals['!sqlName']=$this->arr('descr')
 
  
}
function select($params){
 $this->sql=new Sql();//$sql=&$this->sql;$sql=array (
  'fields' => 'A.id , A.title , A.descr , A.parent , A.ordr , A.type , A.ways , A.date , A.lat , A.lon ',
  'from' => 'markers A ',
  'where' => NULL,
  'order' => NULL,
); 
 









 
 $this->sql->query=$sql; 
}
function prepareForDisplay($params){
  
 /* $this->arr('descr')=unhtmlspecialchars($this->arr('descr')); */
 
  
}
function beforeEdit($params){
 $this->arr=$this->data['result']->next();/* If has owner -   if isset (arr{owner]) - if owner==user id  $arr['owner']='owner' hide owner value? show class='owner' in template */ 
  
  
}
function initLang($params){
 /*initLang  for object operations*/ 
 $lang["id"]["Title"]="id";//old$lang["id"]["Hint"]="";//old$lang["id"]["Value"]="id"; $or["id"] =" OR tID='amuy' ";
$lang["title"]["Title"]="Title";//old$lang["title"]["Hint"]="";//old$lang["title"]["Value"]="Title"; $or["title"] =" OR tID='amyc' ";
$lang["descr"]["Title"]="Description";//old$lang["descr"]["Hint"]="";//old$lang["descr"]["Value"]="Description"; $or["descr"] =" OR tID='amym' ";
$lang["parent"]["Title"]="Parent";//old$lang["parent"]["Hint"]="";//old$lang["parent"]["Value"]="Parent"; $or["parent"] =" OR tID='aosw' ";
$lang["ordr"]["Title"]="Order";//old$lang["ordr"]["Hint"]="";//old$lang["ordr"]["Value"]="Order"; $or["ordr"] =" OR tID='aora' ";
$lang["type"]["Title"]="Type";//old$lang["type"]["Hint"]="";//old$lang["type"]["Value"]="Type"; $or["type"] =" OR tID='aorc' ";
$lang["ways"]["Title"]="2ways";//old$lang["ways"]["Hint"]="";//old$lang["ways"]["Value"]="2ways"; $or["ways"] =" OR tID='aosj' ";
$lang["date"]["Title"]="Date";//old$lang["date"]["Hint"]="";//old$lang["date"]["Value"]="Date"; $or["date"] =" OR tID='aosp' ";
$lang["lat"]["Title"]="Lat";//old$lang["lat"]["Hint"]="";//old$lang["lat"]["Value"]="Lat"; $or["lat"] =" OR tID='aorm' ";
$lang["lon"]["Title"]="Lon";//old$lang["lon"]["Hint"]="";//old$lang["lon"]["Value"]="Lon"; $or["lon"] =" OR tID='aorw' ";
 
 global $config;//$sql="SELECT * FROM `_langs` WHERE `Lang`='".$config['lang']."'  AND ( 0 ".implode ("", $or).");";$this->data['lang']=$lang; 
}
function locClientInitForm($params){
 //if ($this->request['_call']['client']!="local") return;/* FOR use PFBC */ //include_once sd.'controller/clients/formsAdaptor.php';$form= new myForm( $this->tID."_f"  );global $config;$form->configure(theme_get_forms_params());$form->configure(array("action"=> $this->object."_".$this->action."/".$this->id));//$form->addElement(new Element_Hidden("tID", $this->atrs['id']));$form->addElement(new Element_Hidden("step", '<%arr:step%>'));//$form->addElement(new Element_Hidden("id", $this->id));//$client=$this->request['_call']['client'];//$form->addElement(new Element_Hidden("client", $client ));$form->addElement(new Element_Hidden("dataType", "json" ));$lang=$this->data['lang'];/*form data init */if (isset($this->data['result'])) {$arr=@$this->data['result']->as_array();$arr=$arr[0]; }if (isset ($this->data['defaults']) && is_array ($this->data['defaults'])){	if (is_array ($arr)) $arr=@array_merge( $this->data['defaults'], $arr);	else $arr=$this->data['defaults']; } $this->arr=@$arr;  /*now comes elements*/ 
 $form->addElement(new Element_Textbox($lang['id']['Value'], "id", array(    "value" => $this->arr('id') , 'readonly'=>'readonly' ))); 
$form->addElement(new Element_Textbox($lang['title']['Value'], "title", array(    "value" => $this->arr('title') ,"required" => 1))); 
 $options=" "; $form->addElement(new Element_TinyMCE($lang["descr"]["Value"], "descr", array(    "value" => $this->arr('descr'), "options"=>$options)));  
$form->addElement(new Element_Hidden( "parent",     $this->arr('parent') )); 
$form->addElement(new Element_Hidden( "ordr",     $this->arr('ordr') )); 
$options=array (
  0 => '0',
  1 => '1',
  2 => '2',
  3 => '3',
  4 => '4',
);
$form->addElement(new Element_Select($lang['type']['Value'], "type", $options, array(    "value" => $this->arr('type')))); 
$form->addElement(new Element_YesNo($lang['ways']['Value'], "ways", array(    "value" => $this->arr('ways')))); 
$form->addElement(new Element_DateTime($lang['date']['Value'], "date", array(    "value" => $this->arr('date') ))); 
$form->addElement(new Element_Textbox($lang['lat']['Value'], "lat", array(    "value" => $this->arr('lat') ,"required" => 1))); 
$form->addElement(new Element_Textbox($lang['lon']['Value'], "lon", array(    "value" => $this->arr('lon') ,"required" => 1))); 
 
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




 $validator["lat"]="regexp"; 
 $validator["lon"]="regexp"; 
 
  
}
function validateServer($params){
 $validator=new FormValidator();//global $config;//ls_include (sd."lang/".(san_action($config['lang']))."/validate.php"); 
  $validator->addValidation("title","req" ); 




 $validator->addValidation("lat","alnum", "vld_num");  $validator->addValidation("lat","req", "vld_req"); 
 $validator->addValidation("lon","alnum", "vld_num");  $validator->addValidation("lon","req", "vld_req"); 
 
 if($validator->ValidateForm($this->request->post())){				//ok validated!!	$this->data['if']="true";//set flag for controll struct			} else {				$this->error ( $validator->GetErrors(),'validate');				$this->data['if']="false";//set flag for controll struct//$this->state="error";} 
}
function beforeSave($params){
 /* put data into save values*/$raw=$this->request->post();//$this->id=$raw['id']; 
 
 if (isset($raw["title"])) $ready["markers"]["title"]["value"]=$raw["title"]; 
 if (isset($raw["descr"])) $ready["markers"]["descr"]["value"]=$raw["descr"]; 
 if (isset($raw["parent"])) $ready["markers"]["parent"]["value"]=$raw["parent"]; 
 if (isset($raw["ordr"])) $ready["markers"]["ordr"]["value"]=$raw["ordr"]; 
 if (isset($raw["type"])) $ready["markers"]["type"]["value"]=$raw["type"]; 
 if (isset($raw["ways"])) $ready["markers"]["ways"]["value"]=$raw["ways"]; 
 if (isset($raw["date"])) $ready["markers"]["date"]["value"]=$raw["date"]; 
 if (isset($raw["lat"])) $ready["markers"]["lat"]["value"]=$raw["lat"]; 
 if (isset($raw["lon"])) $ready["markers"]["lon"]["value"]=$raw["lon"]; 
 
 $this->data['ready']=$ready; 
}}