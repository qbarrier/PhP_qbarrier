#!/usr/bin/php
<?php
    if ($argc != 2)
        exit();
    $tab = array_filter(explode(" ", $argv[1]));
    $str = "";
    foreach($tab as $word)
    {
        $str .= "{$word} ";
    }
    echo trim($str) . "\n";
    

