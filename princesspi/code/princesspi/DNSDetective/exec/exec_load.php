<?php
$requestmethods = "../config/requestmethods.txt";
if($_POST['domain']) {
$methods = explode("\n",file_get_contents($requestmethods));

  for($i=0; $i<count($methods); $i++)
  {
    echo "<b>{$methods[$i]}:</b><br><iframe src='{$methods[$i]}{$_POST['domain']}'></iframe><br><br>";

  }
}