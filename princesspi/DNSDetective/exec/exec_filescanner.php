<?php
$filenames = "../config/filenames.txt";
if($_POST['domain']) {
$fileslist = explode("\r\n",file_get_contents($filenames));
}

$pstart = '<div class="overflow">';
$pend = '</div>';

for($i=0; $i<count($fileslist); $i++)
{
    $url = 'http://'.$_POST['domain'].'/'.$fileslist[$i];
    if($contents = file_get_contents($url)) {
        echo '<h4>'.$url.'</h4>'.$pstart.htmlspecialchars($contents).$pend;
    }
}

?>