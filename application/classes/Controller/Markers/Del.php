<?php class Controller_Markers_Del extends  LsController {
 public $classID='aota' ;
 public $object='markers' ;
 public $action='del' ;
 public $atrs=array (
  'name' => 'Delete',
  'hint' => '',
  'actType' => 'block',
  'var' => '',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => '',
  'param' => '',
  'menuType' => 'standAlone',
  'isOne' => 'false',
  'selectBefore' => 'false',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
  'id' => 'aota',
  'key' => 'del',
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