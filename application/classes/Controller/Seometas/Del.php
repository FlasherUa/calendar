<?php class Controller_Seometas_Del extends  LsController {
 public $classID='anwr' ;
 public $object='seometas' ;
 public $action='del' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Delete',
  'actType' => 'form',
  'param' => 'search',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'false',
  'selectBefore' => 'false',
  'ajaxTargt' => '',
  'usesuspended' => 'false',
  'useFolders' => 'false',
  'key' => 'del',
  'id' => 'anwr',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'menuType' => 'toMany',
  'useSuspended' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
  'nameEN' => 'Delete',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'del',
    'return' => 'message',
    'id' => 'bVf',
    'parent' => 'Standart',
  ),
  2 => 
  array (
    'name' => 'confirm',
    'parent' => NULL,
  ),
  3 => 
  array (
    'name' => 'delDB',
    'return' => 'message',
    'id' => 'bVF',
    'parent' => 'SQLext',
  ),
  4 => 
  array (
    'name' => 'afterDel',
    'parent' => NULL,
  ),
) ;}