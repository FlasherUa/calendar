<?php class Controller_Routes_List extends  LsController {
 public $classID='aopn' ;
 public $object='routes' ;
 public $action='list' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'List',
  'actType' => 'template',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'false',
  'selectBefore' => 'true',
  'usesuspended' => 'true',
  'cacheUse' => 'false',
  'ajaxTargt' => '',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
  'key' => 'list',
  'id' => 'aopn',
  'actdescr' => '',
  'stndartStrategy' => '',
  'param' => '',
  'menuType' => 'objectMenu',
  'nameEN' => 'List',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'list',
    'return' => 'next',
    'id' => 'bVb',
    'parent' => 'Standart',
  ),
  2 => 
  array (
    'name' => 'loadPlugin',
    'parent' => NULL,
    'params' => 
    array (
      'plugin' => 'filter',
    ),
  ),
  3 => 
  array (
    'name' => 'loadPlugin',
    'parent' => NULL,
    'params' => 
    array (
      'plugin' => 'pagination',
    ),
  ),
  4 => 
  array (
    'name' => 'select',
    'return' => 'data',
    'id' => 'bVy',
    'parent' => 'SQL',
  ),
  5 => 
  array (
    'name' => 'beforeSelect',
    'parent' => NULL,
  ),
  6 => 
  array (
    'name' => 'prepareSelectSQL',
    'parent' => NULL,
  ),
  7 => 
  array (
    'name' => 'sqlGO',
    'return' => 'data',
    'id' => 'bVG',
    'parent' => 'SQLext',
  ),
  8 => 
  array (
    'name' => 'initDB',
    'parent' => NULL,
  ),
  9 => 
  array (
    'name' => 'sqlGOO',
    'parent' => NULL,
  ),
  10 => 
  array (
    'name' => 'afterSelect',
    'parent' => NULL,
  ),
  11 => 
  array (
    'name' => 'prepareForDisplay',
    'parent' => NULL,
  ),
  12 => 
  array (
    'name' => 'rawItems',
    'return' => 'next',
    'id' => 'aaac',
    'parent' => 'Parser',
  ),
  13 => 
  array (
    'name' => 'beforePrint',
    'parent' => NULL,
  ),
  14 => 
  array (
    'name' => 'parseList',
    'return' => 'next',
    'id' => 'bVT',
    'parent' => 'Client',
  ),
) ;
function select($params){
 $this->sql=new Sql();//$sql=&$this->sql;$sql=array (
  'fields' => 'A.id , A.title , A.text , A.Suspended ',
  'from' => 'routes A ',
  'where' => NULL,
  'order' => NULL,
); 
 



 
 $this->sql->query=$sql; 
}
function rawItems($params){
 /*function is called from pack_parser so if params not array - return*/ 
  
 return $params; 
}}