#!/usr/bin/php
<?php
    function ft_split($string)
    {
        $tab = array_filter(explode(" ", $string));
        sort($tab);
        return $tab;
    }

//  Test :
/*  print_r(ft_split("Hello        World AAA"));
  print_r(ft_split("    Milieu     "));
  print_r(ft_split("        "));
  print_r(ft_split("début   "));
  print_r(ft_split(""));
  print_r(ft_split("\ttab\nNewLine"));
  print_r(ft_split(" \n \n \r \t "));
*/
