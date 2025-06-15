#!/usr/bin/php
<?php
    if ($argc == 1)
        exit();
    $tab = array();
    array_shift($argv);                                     //enleve 1er argv
    foreach($argv as $argument)                             //parcours chaque argv / filtre les whitespaces pour ne garder que des tableaux de mots dans "tmp"/ parcours ces tableaux et stock chaque mot dans "tab"
    {
        $tmp = array_filter(explode(" ", $argument));
        foreach($tmp as $elem)
            array_push($tab, $elem);
    }
    sort($tab);
    foreach($tab as $word)
        echo "$word\n";