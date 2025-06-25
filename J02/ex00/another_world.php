#!/usr/bin/php
<?php
if($argc < 2)
    exit();
$str = $argv[1];
$res = trim(preg_replace("~\s+~", " ",$str));       //  "\s" = tout séparateur.  // "+" = plusieurs fois le caractère.
echo $res . "\n";