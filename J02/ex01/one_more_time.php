#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/Paris');

    $jour = array (
        1 => "lundi",
        2 => "mardi",
        3 => "mercredi",
        4 => "jeudi",
        5 => "vendredi",
        6 => "samedi",
        7 => "dimanche");

    $mois = array (
        1 => "janvier",
        2 => "février",
        3 => "mars",
        4 => "avril",
        5 => "mai",
        6 => "juin",
        7 => "juillet",
        8 => "août",
        9 => "septembre",
        10 => "octobre",
        11 => "novembre",
        12 => "décembre");

    if ($argc == 1)
        exit();
    $date = array_values(array_filter(explode(" ", $argv[1]), "strlen"));
    if (count($date) != 5 ||
        !preg_match("~^([1-9]|0[1-9]|[1-2][0-9]|3[0-1])$~", $date[1]) ||
        !preg_match("~^[0-9]{4}$~", $date[3]) ||
        !preg_match("~^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$~", $date[4]))
    {
        echo "Wrong Format\n";
        exit();
    }
    $date[0] = array_search(lcfirst($date[0]), $jour);
    $date[2] = array_search(lcfirst($date[2]), $mois);
    if (!$date[0] || !$date[2])
    {
        echo "Wrong Format\n";
        exit();
    }
    $time = array_filter(explode(":", $date[4]));
    $ret = mktime($time[0], $time[1], $time[2], $date[2], $date[1], $date[3]);
    echo $ret . "\n";