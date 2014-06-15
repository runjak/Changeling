<html>
<head>
<title>Princess Pi's Manual Request Forge!</title>
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
</style>
</head>
<body>
<h1 class="title">Princeess Pi's Magic Mirror</h1>
<p>Find out who you <i>truly</i> are with Princess Pi's Magic Mirror!</p>

<p>
<pre>
<?php
echo http_get_request_body();

print_r(apache_request_headers());

print_r($_GET);

print_r($_POST);
?>
</pre>
</p>
<p><form action="" method="post">
<input type="text" name="message"> <input type="submit" value="Submit POST">
</form></p>
<p>
<img src=""></p>
</body>
</html>