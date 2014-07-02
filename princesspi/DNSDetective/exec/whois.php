<?
require("../includes/whoisClass.php");
$whois=new Whois;
echo $whois->whoislookup($_POST['domain']);
?>