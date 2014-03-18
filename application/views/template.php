<?php 
echo  View::factory('parts/header');
echo  View::factory('parts/contact')->bind("_core", $core);

//echo $core; 
echo  View::factory('parts/footer');