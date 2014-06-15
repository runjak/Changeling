<?php error_reporting(0); ?>
<!-- Just make a directory "images" with as many sub dirs you like and BAM instant image/swf browser -->
<html>
<!-- Abandon all hope, ye who enter here -->
<head>
<script type="text/javascript">
function show(id)
{
  document.getElementById(id).style.display="block";
}
</script>

<style type="text/css">
.hidden { display: none; }
body {
    font-family: Georgia,Palatino,serif;
    background-color: #FFDDDD;
}

h1.title {
    color: purple;
	font-size: 3em;
}

img { border: 0; }
</style>
</head>

<body>

<h1 class="title">Princess Pi's SimpleSolution Media File</h1>

<p><a href="javascript:history.back()">Back</a> | <a href="index.php">Top</a></p>

<span>Folders:</span><br>
<?php
$startdir = 'images';

// Some precautions
$_GET['dir'] = preg_replace("(\.\.)",'#',$_GET['dir']);

$scandir = $startdir.'/';
if(isset($_GET['dir'])) { $scandir.= $_GET['dir'].'/'; }

$current = $_GET['dir'].'/';

$dir = scandir($scandir);

$length = count($dir);

$i = 0;

for($i; $i<$length; $i++)
{
  $item = $dir[$i];

  if($item != '.' && $item != '..')
  {
    if(preg_match("/(\.(gif|bmp|png|jpg|jpeg|tiff))$/i",$item)) { $images[] = $scandir.$item; }
    else if(preg_match("/(\.swf)$/i",$item)) { $flash[] = $scandir.$item; }
    else if(preg_match("/(\.[0-9a-zA-Z]{2,5})$/i",$item)) { $trash[] = $scandir.$item; }
    else if(is_dir($scandir.$item)) { $directories[] = $current.$item; }
    else { echo "File $item Not Making Sense"; }
  }
}

// Output Dir Links
if(!empty($directories)) {
foreach($directories as $value)
{
  echo "<a href=\"index.php?dir=$value\">$value</a><br>";
} }
?>

<?php if(!empty($images)) { ?>
<p><input type="button" value="Show Images (<?php echo count($images); ?>)" onclick="show('images')"></p>
<?php } if(!empty($flash)) { ?>
<p><input type="button" value="Show Flash (<?php echo count($flash); ?>)" onclick="show('flash')"></p>
<?php } ?>

<div class="hidden" id="images">
<?php
foreach($images as $value)
{
  echo "<p><img src=\"$value\"></p>";
}
?>
</div>

<div class="hidden" id="flash">
<?php
foreach($flash as $value)
{
  echo "<object width=\"550\" height=\"400\"><param name=\"movie\" value=\"$value\"><embed src=\"$value\" width=\"550\" height=\"400\"></embed></object>";
}
?>
</div>
</body>
</html>