#!/c/xampp/php/php
<?php
    while (true)
    {
        echo "Entrez un nombre: ";
        
        if (feof(STDIN))
        {
            echo "\n";
         exit();
        }
        $num = trim(fgets(STDIN), "\n\r");
        if (is_numeric($num))
        {
  
            if ($num % 2 != 0)
            {
                echo "Le chiffre " . $num . " est Impair\n";

            }
            else
            {
                echo "Le chiffre $num est Pair\n";
            }
        }
        else
        {
            echo "'" . $num . "' n'est pas un chiffre\n";
        }
    }
