
<?php
$data = file_get_contents('http://apecpv.cmru.ac.th:1880/erdibot');
$character = json_decode($data);
var_dump ($character);
?>
