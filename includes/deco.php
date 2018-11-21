<?php

$temps= 365*24*3600;
$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
setcookie('pseudo', "ok", time(), '/', $domain, false);
header("Location:..\index.php");


?>