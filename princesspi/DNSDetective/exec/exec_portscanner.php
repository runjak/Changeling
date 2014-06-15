<?php
$portsfile = '../config/ports.txt';
if($_POST['domain']) {
$ports = explode("\n",file_get_contents($portsfile));
//$ports = [21,22,23,25,53,80,110,119,156,194,443,1080,2082,3306,546,547,8080];
$host = $_POST['domain'];
for($i=0;$i<count($ports);$i++) { 
$fp = fsockopen($host,$ports[$i],$errno,$errstr,1); 
if($fp) 
{ 
echo "Port " . $ports[$i] . " open on " . $host . "\r\n"; 
fclose($fp); 
} 

flush(); 
} //end for

}
?>