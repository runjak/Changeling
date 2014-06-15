<?php
$details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));


$ip = $details['geoplugin_request'];
$city = $details['geoplugin_city'];
$state = $details['geoplugin_regionName'];
$country = $details['geoplugin_countryName'];

echo "<p><b>Your IP address: <i>$ip</i></b></p><p>Your location {$state}, {$country} near $city";
?>