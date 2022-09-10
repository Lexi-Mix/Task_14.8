<?php

use LDAP\Result;

$time = time();
$time2 = strtotime('00:00:00'); 
echo $result = date('H:i:s',$time2 - time());
?>