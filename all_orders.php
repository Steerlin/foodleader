<?php

$json = '';
foreach (glob("orders/*.json") as $file) {
    $json .= file_get_contents($file);
}

echo str_replace('][', ',', $json);
