<?php class Controller_Markers_Orderdn extends  LsController {
 public $classID='aotd' ;
 public $object='markers' ;
 public $action='orderdn' ;
 public $atrs=array (
  'menuDefault' => 'true',
  'name' => 'Dn',
  'actType' => 'customPHP',
  'cache' => '60',
  'hint' => '',
  'isOne' => 'false',
  'selectBefore' => 'false',
  'usesuspended' => 'true',
  'key' => 'orderdn',
  'id' => 'aotd',
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
    'name' => 'orderdn',
  ),
  2 => 
  array (
    'name' => 'customPHP',
    'return' => 'next',
    'id' => 'bVo',
    'parent' => 'Misc',
  ),
) ;}