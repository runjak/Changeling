<?php
$title = 'Encrypt a file';

$body = <<<EOT
<form enctype="multipart/form-data" action="exec_encrypt.php" method="post">
<label for="plaintext">Your Message to Encrypt</label><br>
<textarea name="plaintext" id="plaintext" rows="10" cols="20"></textarea><br><br>
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
Upload a <a href="generate.php">CypherPad</a><br>
<input name="uploadedfile" type="file" id="file"><br><br>
<input type="submit" value="Encrypt and Download">
</form>
EOT;

include('template.php');
?>