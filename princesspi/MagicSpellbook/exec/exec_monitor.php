<?php
  exec("sudo airmon-ng {$_POST['action']} {$_POST['device']}", $output, $status);
  print_r($output);
?>