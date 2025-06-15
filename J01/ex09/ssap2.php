#!/usr/bin/php
<?php
    if ($argc == 1)
        exit();
    $tab_num = array();
    $tab_str = array();
    $tab_other = array();
    $tab = array();
    array_shift($argv);                                     //enleve 1er argv
    foreach($argv as $argument)                             //parcours chaque argv / filtre les whitespaces pour ne garder que des tableaux de mots dans "tmp"/ parcours ces tableaux et stock chaque mot dans "tab"
    {
        $tmp = array_filter(explode(" ", $argument));
        foreach($tmp as $elem)
        {
            
            if (ord($elem) >= 48 && ord($elem) <= 57)
                array_push($tab_num, $elem);
            elseif ((ord($elem) >= 65 && ord($elem) <= 90) || (ord($elem) >= 97 && ord($elem) <= 122))
                array_push($tab_str, $elem);
            else
                array_push($tab_other, $elem);
        }
    }
    sort($tab_num);
    natcasesort($tab_str);
    sort($tab_other);
    $tab = array_merge($tab_str, $tab_num, $tab_other);
    foreach($tab as $word)
        echo "$word\n";