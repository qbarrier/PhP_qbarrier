#!/usr/bin/php
<?php
if ($argc < 2)
    exit();
    array_shift($argv);                                     //enleve 1er argv
    $search = $argv[0];
    array_shift($argv);                                     //enleve 2em argv
    foreach($argv as $argument)                             
    {
        $tmp = explode(":", $argument);
        print_r($tmp);
        if (count($tmp) == 2)
           $tab[$tmp[0]] = $tmp[1];                         // Crée ou Remplace un élément d'array Key => Value
    }
        if (array_key_exists($search, $tab))
            echo $tab[$search] . "\n";
