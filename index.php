<?php
if ($_SERVER['SERVER_NAME']=="localhost") include "application/index_dev.php";
else include "application/index_prod.php" ;

