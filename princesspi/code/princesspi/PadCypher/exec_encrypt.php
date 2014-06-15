<?php
$file =  file_get_contents($_FILES['uploadedfile']['tmp_name']);
$plaintext = stripslashes($_POST['plaintext']);

$pad_array = explode('-',$file);

for($i=0; $i<count($pad_array); $i++)
{
  if($plaintext !== null) { $out[$i] = $pad_array[$i]+ord($plaintext[$i]); }
  else { $out[$i] = $pad_array[$i]; }
}


header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=Message.pad");
header("Content-Type: application/pad");
header("Content-Transfer-Encoding: binary");

echo implode('-',$out);
?>