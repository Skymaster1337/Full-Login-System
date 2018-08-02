<?php
require_once('class.user.php');

$p = isset($_GET['psw'])?$_GET['psw']:false;

if($p == FALSE){
  exit();
}
else {
  echo hash_psw($p);
}

?>