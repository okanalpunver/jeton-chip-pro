<?php

foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
    if ($filename == 'bootstrap.php') {
        continue;
    }
    
    require_once $filename;
}