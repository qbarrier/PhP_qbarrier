#!/usr/bin/php
<?php
    if ($argc == 1)
        exit();
    $tab = array_values(array_filter(explode(" ", $argv[1])));      // parse l'argument avec nouvelles keys 0, 1, 2 ...
    array_push($tab, $tab[0]);                                      // rajoute un élément à la fin
array_shift($tab);                                                  // retire le premier élément
    $ret = "";
    foreach ($tab as $word)
        $ret .= $word . " ";
    echo trim($ret) . "\n";