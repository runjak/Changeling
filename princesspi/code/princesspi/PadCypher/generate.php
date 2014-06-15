<?php
$title = 'Generate a Pad';
$body = <<<EOT
<p>In order to use the PadCypher Encryption System, you first must generate a pad of equal or greater length to the message(s) You will be sending.</p>
<p>We will never use a pad of the exact size of your message, because that gives one more piece of information to an attacker that may be used against you.</p>
<p>Begin by selecting the maximum length of the message(s) you intend to send, and then download a random pad file.</p>
<form action="exec_generate.php" method="post">
<fieldset>
<legend>Select a Pad Size</legend>
<input type="radio" name="length" value="10" id="ten">
  <label for="ten">Ten Characters</label><br>
<input type="radio" name="length" checked="checked" value="100" id="hundred">
  <label for="hundred">One Hundred Characters</label><br>
<input type="radio" name="length" value="1000" id="thousand">
  <label for="thousand">One Thousand Characters</label><br>
<input type="radio" name="length" value="10000" id="tenthousand">
  <label for="tenthousand">Ten Thousand Characters</label><br>
<input type="submit" value="Generate Pad">
</fieldset>
</form>
EOT;

include('template.php');
?>