<?php class Controller_Markers_Orderup extends  LsController {
 public $classID='aotc' ;
 public $object='markers' ;
 public $action='orderup' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Up',
  'actType' => 'customPHP',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'false',
  'selectBefore' => 'false',
  'usesuspended' => 'true',
  'key' => 'orderup',
  'id' => 'aotc',
  'actdescr' => '',
  'cacheUse' => 'false',
  'stndartStrategy' => 'customPHP',
  'param' => '',
  'menuType' => 'system',
  'useSuspended' => 'false',
  'useFolders' => 'false',
  'hasPages' => 'false',
  'isoff' => 'false',
) ;
 public $strategy=array (
  1 => 
  array (
    'name' => 'orderup',
  ),
  2 => 
  array (
    'name' => 'customPHP',
    'return' => 'next',
    'id' => 'bVo',
    'parent' => 'Misc',
  ),
) ;}