<?php

$json = file_get_contents("php://input");
$employeeId = $_SERVER['QUERY_STRING'];
$file = fopen("orders/" . $employeeId . ".json", 'w+');
fwrite($file, $json);
fclose($file);
