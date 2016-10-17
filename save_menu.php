<?php

$json = file_get_contents("php://input");
$file = fopen('menu.json', 'w+');
fwrite($file, $json);
fclose($file);
