#!/usr/bin/php
<?php
    if ($argc != 2 || !file_exists($argv[1]))
    {
        echo "Wrong Syntax\n";
        exit();
    }
    $read = fopen($argv[1], "r");
    while ($buffer = fgets($read))
    {
        $buffer = preg_replace_callback("/(<a .*?title=\")(.*?)(\")/s", function($matches) {
            return ($matches[1] . strtoupper($matches[2]) . $matches[3]);
        }, $buffer);
        $buffer = preg_replace_callback("/(<a .*?>)(.*?)(<)/s", function($matches) {
            return ($matches[1]."".strtoupper($matches[2])."".$matches[3]);
        }, $buffer);
        echo $buffer;
    }
    fclose($read);