<?php
// Files to scan for (array)
$fileslist = array('/robots.txt', '/crossdomain.xml', '/cpanel', '/webmail');
?>
<html>
<head>
<title>Princess Pi's DNS Detective!</title>
<style type="text/css">
body {
    font-family: Georgia,Palatino,serif;
    background-color: #FFDDDD;
}

h1.title {
    color: purple;
	font-size: 3em;
}

img { border: 0; }

.hidden { display: none; }

input[type=text],textarea { 
    border: 2px solid purple;
    background-color: #FFEEEE;
}

input[type=text]:focus,textarea:focus {
    border: 2px solid pink;
}

select {
    border: 2px solid purple;
    background-color: #FFEEEE;
}

select:focus {
    border: 2px solid pink;
}

input[type=button],input[type=file],input[type=submit] {
    border: 2px solid purple;
    background: #FFEEEE;
}

input[type=button]:hover,input[type=file]:hover,input[type=submit]:hover {
    background: #FFAAAA;
}

.right {
    float: right;
    width: 33%;
}

.left {
    float: left;
}

.overflow {
    overflow: scroll;
    height: 200px;
}

.clear {
    clear: both;
}
</style>
</head>
<body>
<h1 class="title">Princeess Pi's DNS Detective!</h1>
<p>Princess Pi is a great detective!  She always knows just where to look to get information on any domain!</p>
<form action="" method="post">
<label for="domain">Domain: </label> <input type="text" name="domain" id="domain"> <input type="submit" value="Get DNS Records">
</form>
<p><?php
if($_POST['domain']) {
$result = dns_get_record($_POST['domain'], DNS_ANY, $authns, $addtl);
echo "<div class='left'><h3>NS Lookup</h3><pre>Result = ";
print_r($result);
echo "Auth NS = ";
print_r($authns);
echo "Additional = ";
print_r($addtl);
echo '</pre><h3>Port Scan:</h3>';
$ports = [21,22,23,25,53,80,110,119,156,194,443,1080,2082,3306,546,547,8080];
$host = $_POST['domain'];
for($i=0;$i<count($ports);$i++) { 
$fp = fsockopen($host,$ports[$i],$errno,$errstr,1); 
if($fp) 
{ 
echo "port " . $ports[$i] . " open on " . $host . "<br>"; 
fclose($fp); 
} 

flush(); 
} //end for

exec("ping -c 3 {$_POST['domain']}", $output, $status);
echo '<h3>Pring</h3><pre>';
print_r($output);
echo '</pre>';

exec("traceroute {$_POST['domain']}", $output, $status);
echo '<h3>Traceroute</h3><pre>';
print_r($output);
echo '</pre>';
}
?></p>
</div>
<div class="right">
<h3>Files</h3>
<p id="files"></p>
<?php
if($_POST['domain']) {
$pstart = '<div class="overflow">';
$pend = '</div>';
for($i=0; $i<count($fileslist); $i++)
{
    $url = 'http://'.$_POST['domain'].$fileslist[$i];
    if($contents = file_get_contents($url)) {
        echo '<h4>'.$url.'</h4>'.$pstart.htmlspecialchars($contents).$pend;
    }
}


echo <<<EOT
</pre>
<h2>Web page loads on: <span id="loadingg"></span></h2>
<h3>Request Methods</h3>
<p class="right" id="methods"></p>
<script type="text/javascript">
var requestMethod = ["http://","https://", "ftp://"];
for(i=0; i<requestMethod.length; i++) 
{
  requestURL = requestMethod[i] + "{$_POST['domain']}/";
  var httpframe = document.createElement("iframe");
  httpframe.src = requestURL;
  httpframe.setAttribute("onload", "document.getElementById('loadingg').innerHTML += ', " + requestMethod[i] + "'");
  httpframe.style.appearance = "hidden";
  document.body.appendChild(httpframe);
}
/*
var filesURL = ['/robots.txt', '/crossdomain.html', '/cpanel', '/webmail'];
alert(filesURL.length);
for(i=0; i<filesURL.length; i++)
{
  requestURL = 'http://' + "{$_POST['domain']}/"; + filesURL[i];
  alert(requestURL);
  var httpframe = document.createElement("iframe");
  httpframe.src = requestURL;
  httpframe.setAttribute("onload", "document.getElementById('files').innerHTML += '" + requestMethod[i] + "' ");
  document.getElementById("methods").appendChild(httpframe);
}
*/
</script>
EOT;
}
?>
</div>
<p class="clear"><img src="images/princesspismall.png"></p>

</body>
</html>