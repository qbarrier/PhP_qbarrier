#!/usr/bin/php
<?php
    $param = $argv;
    array_shift($param);
    foreach($param as $argument)
    {
        echo $argument . "\n";
    }