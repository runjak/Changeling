<?php
if($_POST['domain']) {
$result = dns_get_record($_POST['domain'], DNS_ANY, $authns, $addtl);
print_r($result);
echo "Auth NS = ";
print_r($authns);
echo "Additional = ";
print_r($addtl);
}
?>