<?php class Controller_Seometas_View extends  LsController {
 public $classID='anwo' ;
 public $object='seometas' ;
 public $action='view' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'View',
  'actType' => 'block',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'true',
  'selectBefore' => 'true',
  'strategy' => 'view,custom:exportButtons',
  'ajaxTargt' => '',
  'usesuspended' => 'false',
  'useFolders' => 'false',
  'key' => 'view',
  'id' => 'anwo',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'param' => '',
  'menuType' => 'toOne',
  'useSuspended' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
  'nameEN' => 'View',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'view',
    'return' => 'data',
    'id' => 'bVc',
    'parent' => 'Standart',
  ),
  2 => 
  array (
    'name' => 'initObject',
    'parent' => NULL,
  ),
  3 => 
  array (
    'name' => 'select',
    'return' => 'data',
    'id' => 'bVy',
    'parent' => 'SQL',
  ),
  4 => 
  array (
    'name' => 'beforeSelect',
    'parent' => NULL,
  ),
  5 => 
  array (
    'name' => 'prepareSelectSQL',
    'parent' => NULL,
  ),
  6 => 
  array (
    'name' => 'sqlGO',
    'return' => 'data',
    'id' => 'bVG',
    'parent' => 'SQLext',
  ),
  7 => 
  array (
    'name' => 'initDB',
    'parent' => NULL,
  ),
  8 => 
  array (
    'name' => 'sqlGOO',
    'parent' => NULL,
  ),
  9 => 
  array (
    'name' => 'afterSelect',
    'parent' => NULL,
  ),
  10 => 
  array (
    'name' => 'prepareForDisplay',
    'parent' => NULL,
  ),
  11 => 
  array (
    'name' => 'rawItems',
    'return' => 'next',
    'id' => 'aaac',
    'parent' => 'Parser',
  ),
  12 => 
  array (
    'name' => 'beforePrint',
    'parent' => NULL,
  ),
  13 => 
  array (
    'name' => 'parse',
    'return' => 'next',
    'id' => 'bVS',
    'parent' => 'Client',
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
function rawItems($params){
 /*function is called from pack_parser so if params not array - return*/ 
  
 return $params; 
}}