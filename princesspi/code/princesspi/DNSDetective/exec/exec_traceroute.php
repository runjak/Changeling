<?php
  exec("traceroute {$_POST['domain']}", $output, $status);
  sleep(15);
  print_r($output);
?>