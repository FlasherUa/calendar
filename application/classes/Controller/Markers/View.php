<?php class Controller_Markers_View extends  LsController {
 public $classID='amut' ;
 public $object='markers' ;
 public $action='view' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'View',
  'actType' => 'block',
  'cache' => '60',
  'hint' => 'View user detailes',
  'isOne' => 'true',
  'selectBefore' => 'true',
  'key' => 'view',
  'id' => 'amut',
  'menuType' => 'toOne',
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
  
 //$vals['!sqlName']=$this->arr('descr')
 
  
}
function select($params){
 $this->sql=new Sql();//$sql=&$this->sql;$sql=array (
  'fields' => 'A.id , A.title , A.descr , A.type , A.ways , A.date , A.lat , A.lon ',
  'from' => 'markers A ',
  'where' => NULL,
  'order' => NULL,
); 
 







 
 $this->sql->query=$sql; 
}
function prepareForDisplay($params){
  
 /* $this->arr('descr')=unhtmlspecialchars($this->arr('descr')); */
 
  
}
function rawItems($params){
 /*function is called from pack_parser so if params not array - return*/ 
  
 return $params; 
}}