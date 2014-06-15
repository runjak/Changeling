<?php
$length = intval($_POST['length']);
if($length > 100000) { die('Length Can Not Be More Than 100,000'); }
else if($length < 10) { die('Length Can Not Be Less Than 10'); }
$pad = null;

for($i=0; $i<$length; $i++)
{
  $pad .= rand(0,32768) . '-';
}

$out = substr($pad,0,-1);

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=Cypher.pad");
header("Content-Type: application/pad");
header("Content-Transfer-Encoding: binary");
echo $out;
?>