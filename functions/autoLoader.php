<?php

$functionFiles = glob('./functions/*.php');

for ($i = 0 ; $i < count($functionFiles) ; $i++) {
    if ($functionFiles[$i] !== './functions/autoLoader.php') {
        require_once $functionFiles[$i];
    }
}