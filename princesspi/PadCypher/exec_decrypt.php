<?php
$message =  file_get_contents($_FILES['message']['tmp_name']);
$pad = file_get_contents($_FILES['pad']['tmp_name']);

$message_array = explode('-',$message);
$pad_array = explode('-',$pad);

if(count($message_array) !== count($pad_array)) { die('Pad Lengths Do Not Match'); }

for($i=0; $i<count($pad_array); $i++)
{
  $mchar= intval($message_array[$i]);
  $pchar = intval($pad_array[$i]);
  $out .= chr($mchar - $pchar);
}
echo str_replace(chr(0),'',$out);
?>