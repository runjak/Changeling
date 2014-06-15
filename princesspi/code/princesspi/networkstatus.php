<html>
<head>
<title>Princess Pi's Network Status</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 class="title">Princess Pi's Network Status</h1>
<p>Its impossible to play with a network without information!  Get needed network information from Princess Pi's magic!</p>
<pre>
<h2>iwconfig</h2>
<?php
exec("/sbin/iwconfig",$output,$status);
print_r($output);

echo "<h2>ifconfig</h2>";
exec("/sbin/ifconfig",$output,$status);
print_r($output);

echo "<h2>iptables --list</h2>";
exec("sudo /sbin/iptables --list",$outputip,$status);
print_r($outputip);

echo "<h2>netstat -lnptu</h2>";
exec("sudo netstat -lnptu",$outputip,$status);
print_r($outputip);

echo "<h2>Wireless Scan (sudo iwlist wlan0 scan)</h2>";
exec("sudo iwlist wlan0 scan",$outscan,$statusscan);
//exec("sudo airodump-ng mon0",$outscan,$statusscan);//
sleep(10);
print_r($outscan);
?>
</pre>
<a href="images/princesspilarge.png"><img src="images/princesspismall.png"></a>
</body>
</html>