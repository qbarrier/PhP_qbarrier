#!/usr/bin/php
<?php
    if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
        exit();
    }
    else if (!$argv[1])
    {
        echo "Syntax Error\n";
        exit();
    }   
    $str = trim($argv[1], " ");                                                                   // Trim l'argument
    $unjump = ($str[0] == '-') ? 1 : 0;                                                           // Si la string commence par '-' on incrémente $unjump // lorsqu'on voudra avancer dans la string d'après la len de $num1, $unjump nous permettra d'arriver au bon endroit
    $num1 = floatval($str);                                                                       // récupère la valeur en float dans $num1, !!! Syntax erreur si un ou des 0 en fin après la virgule
    if ($str[0] == '+' || $str[0] == '-')                                                         // on avance si la chaine commence par un signe '-' ou '+' 
        $str =   substr($str, 1);                                                                 
    if (strcmp($num1, "-0") == 0)                                                                  // Comportement spécial 
        $unjump = 2;                                                                              // si $num1 == "-0" on reculera de 2 dans la string
    else if (strcmp($num1, "0") == 0)
        $unjump = 1;                                                                              
    else if ($num1 > -1 && $num1 < 1)
        $unjump++;                                                                                // Si on a un chiffre à virgule commençant par "-0.xx" ou "0.xx" on avancera de 1 en plus
    $str = ltrim($str, "0");                                                                      // Trim tous les premiers "00"
    $str = trim(substr($str, strlen($num1) - $unjump), " ");                                      // on avance de la longueur de $num1 - $unjump ex: $str avant trim "-0021*-2" => $str = "21-2"; $num1 = "-21"; strlen($num1) = 3; $unjump = 1; new $str = "*-2"
    $operator = $str[0];                                                                          // Récupère le char dans $operator
    $num2 = trim(substr($str, strlen(1)), " ");                                                   // Trim de nouveau le reste de la string après le char operator et le stock dans $num2
    if (!is_numeric($num1) || !is_numeric($num2))                                                 // Vérifie si nos nombres $num1 et $num2 sont bien numériques
    {
        echo "Syntax Error\n";
        exit();
    }
    switch($operator)                                                   // Traite les opérations selon l'opérateur $operator // Renvoie Syntax error si $operator invalide.
    {
        case "+" :
            echo $num1 + $num2 . "\n";
            break;
        case "-" :
            echo $num1 - $num2 . "\n";
            break;
        case "/" :
            echo $num1 / $num2 . "\n";
            break;
        case "*" :
            echo $num1 * $num2 . "\n";  
            break;
        case "%" :
            echo $num1 % $num2 . "\n";
            break;
        default :
            echo "Syntax Error\n";
    }