<?php class Controller_Routes_Search extends  LsController {
 public $classID='aopo' ;
 public $object='routes' ;
 public $action='search' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Search',
  'actType' => 'form',
  'param' => 'search',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'false',
  'selectBefore' => 'true',
  'key' => 'search',
  'id' => 'aopo',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'menuType' => 'standAlone',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'search',
    'return' => 'next',
    'id' => 'aabp',
    'parent' => 'Standart',
  ),
  2 => 
  array (
    'name' => 'beforeSearch',
    'return' => 'next',
    'id' => 'aabt',
    'parent' => 'funcs_nopakadge',
  ),
  3 => 
  array (
    'name' => 'list',
    'return' => 'next',
    'id' => 'bVb',
    'parent' => 'Standart',
  ),
  4 => 
  array (
    'name' => 'loadPlugin',
    'parent' => NULL,
    'params' => 
    array (
      'plugin' => 'filter',
    ),
  ),
  5 => 
  array (
    'name' => 'loadPlugin',
    'parent' => NULL,
    'params' => 
    array (
      'plugin' => 'pagination',
    ),
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
    'name' => 'rawItems',
    'return' => 'next',
    'id' => 'aaac',
    'parent' => 'Parser',
  ),
  15 => 
  array (
    'name' => 'beforePrint',
    'parent' => NULL,
  ),
  16 => 
  array (
    'name' => 'parseList',
    'return' => 'next',
    'id' => 'bVT',
    'parent' => 'Client',
  ),
) ;
function beforeSearch($params){
 $this->searchfields=array(); 
 $this->searchfields[]="title";
 
  
}
function select($params){
 $this->sql=new Sql();//$sql=&$this->sql;$sql=array (
  'fields' => 'A.title , A.text ',
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