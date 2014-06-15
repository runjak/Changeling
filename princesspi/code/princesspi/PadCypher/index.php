<?php

$title = 'Pad Cypher Encryption System';

$body = <<<EOT
<h1 class="title">Princess Pi's Unbreakable Pad Cypher!</h1>
<p>You and your friend will share the pad file, and so long as that pad file is never compromised, the message files will always be unbreakable!</p>
<p>Princess Pi uses this technology to send secret messages to Shining Armor in times of danger!</p>
<ul>

 <li><a href="encrypt.php">Encrypt a Message</a></li>

 <li><a href="decrypt.php">Decrypt a Message</a></li>

 <li><a href="generate.php">Generate a Pad</a></li>

</ul>

EOT;

include('template.php');

?>