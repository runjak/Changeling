<?php
if($_POST['domain'])
{
  exec("ping -c 4 {$_POST['domain']}", $output, $status);
  print_r($output);
}
?>