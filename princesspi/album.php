<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<title>Violation Warning</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
    margin: 15px;
}

#warning {
    width: 50%;
	border-right: 4px solid black;
	float: left;
}

#personalinfo {
    border-top: 4px solid black;
	clear: both;
}

#information {
    float: left;
	margin-left: 60px;
}
</style>


<body>
<div id="warning">
<h1>You are in violation of 18 USC &sect; 2251 - Sexual exploitation of children</h1>
<h2>Sexual exploitation of children carries with it a minimum sentence of 15 years in federal prison</h2>
<h2>This crime CAN be prosecuted internationally with international extridition treaties and cooperation agreements</h2>
<h3>Your IP address along with all the prvate information gathered and will be available to the FBI </h3>
</div>

<div id="information">
<h1>Further Information</h1>
<ul>
  <li><a href="http://www.fbi.gov/about-us/investigate/cyber/innocent/innocent">FBI Child Exploitation Taskforce</a></li>
  <li><a href="http://www.prevent-abuse-now.com/law3.htm#2251">Full Text of 18 USC &sect; 2251</a></li>
  <li><a href="http://lawyers.findlaw.com/lawyer/practice/Criminal-Law">Find a Criminal Defence LAwyer</a></li>
</ul>
</div>
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

getRealIpAddr();
$details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.getRealIpAddr()));

echo '<pre>';
print_r($details);
echo '</pre>';

$ip = $details['geoplugin_request'];
$city = $details['geoplugin_city'];
$state = $details['geoplugin_regionName'];
$country = $details['geoplugin_countryName'];

echo "<div id=\"personalinfo\"><p><b>Your IP address: <i>$ip</i></b></p><p>Your location {$state}, {$country} near $city</div>";

if(!is_writable('log.txt')) { echo  'no write'; }

file_put_contents('log.txt',"$ip - $city,$state,$country\n\r",FILE_APPEND);


?>
</body>
</html>