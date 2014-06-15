<?php
$title = 'Decrypt a File';

$body = <<<EOT
<form action="exec_decrypt.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
Upload a <a href="encrypt.php">Message File</a> <input name="message" type="file"><br>
Upload a <a href="generate.php">CypherKey</a>
<input name="pad" type="file"><br><br>
<input type="submit" value="Decrypt">
</form>
EOT;

include('template.php');
?>