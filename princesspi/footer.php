<?php
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
     $ip=$_SERVER['HTTP_CLIENT_IP'];
	}  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.getRealIpAddr()));

$ip = $details['geoplugin_request'];
$city = $details['geoplugin_city'];
$state = $details['geoplugin_regionName'];
$country = $details['geoplugin_countryName'];

if(!is_writable('logimage.txt')) { echo  'no write'; }

file_put_contents('logimage.txt',"$ip - $city,$state,$country\n\r",FILE_APPEND);

$img = imagecreatefrompng($_GET['png']);
header('Content-Type: image/png');
imagepng($img);
?>