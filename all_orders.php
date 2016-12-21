<?php

$json = '';
foreach (glob("orders/*.json") as $file) {
    $contents = file_get_contents($file);
    if ($contents == '[]') {
        continue;
    }
    $json .= $contents;
}

echo str_replace('][', ',', $json);
