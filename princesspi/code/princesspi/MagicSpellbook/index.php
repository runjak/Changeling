<?php
exec("sudo iwconfig | grep -o -P \"wlan[0-9]|mon[0-9]\"", $output, $status);
//foreach($output as $item) { $devices .= "<option value='$item'>$item</option>\r\n"; echo $item;}
for($i=0; $i<count($output); $i++)
{
  $devices .= "<option value='$output[$i]'>$output[$i]</option>\r\n";
}
?>
<html>
<head>
<title>Princess Pi's Magic Spellbook!</title>
<style type="text/css">
body {
    font-family: Georgia,Palatino,serif;
    background-color: #FFDDDD;
}

pre {
    font-family: "Comic Sans MS", cursive, sans-serif;
}

h1.title {
    color: purple;
	font-size: 3em;
}

img { border: 0; }

.hidden { visibility: hidden; }

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){

  $("#button").click(function(){

    $("#results").css({"visibility":"visible"});

    $.post("exec/exec_monitor.php",
    {
      device:$("#device").val(),
      action:$("#action").val()
    },
    function(data,status){
      $("#sstopwlan").text(data);
    }) });
/*
    $.post("exec/exec_nslookup.php",
    {
      domain:$("#domain").val()
    },
    function(data,status){
      $("#nslookup").text(data);
    });

    $.post("exec/exec_ping.php",
    {
      domain:$("#domain").val()
    },
    function(data,status){
      $("#ping").text(data);
    });

    $.post("exec/exec_traceroute.php",
    {
      domain:$("#domain").val()
    },
    function(data,status){
      $("#traceroute").text(data);
    });

    $.post("exec/exec_filescanner.php",
    {
      domain:$("#domain").val()
    },
    function(data,status){
      $("#files").html(data);
    });

    $.post("exec/exec_load.php",
    {
      domain:$("#domain").val()
    },
    function(data,status){
      $("#requestmethods").html(data);
    });
  });
*/
});
</script>
</head>
<body>
<h1 class="title">Princeess Pi's Magical Spellbook!</h1>
<p>With Princess Pi's Magical Spellbook, you can perform many common tasks in a friendly, pony-like interface.</p>

<!--<label for="domain">Domain: </label> <input type="text" name="domain" id="domain">-->
<select id="action">
<option value="start">Start</option>
<option value="stop">Stop</option>
</select>
<select id="device">
<?php echo $devices; ?>
</select>
<input type="button" id="button" value="Execute">

<div id="results" class="hidden">
<h3>Port Scan:</h3>
<p><pre id="portscanner">Loading...</pre></p>
<br>
<h3>Start/Stop Wireless Devices</h3>
<p><pre id="sstopwlan">Loading...</pre></p>
<br>
<h3>Request Methods:</h3>
<pre id="requestmethods">
</pre>
<br>
<h3>Ping:</h3>
<p><pre id="ping">Loading...</pre></p>
<br>
<h3>Traceroute:</h3>
<p><pre id="traceroute">Loading...</pre></p>

<h3>Files:</h3>
<pre id="files">
Waiting...
</pre>
</div>
<p class="clear"><img src="../images/princesspismall.png"></p>

</body>
</html>