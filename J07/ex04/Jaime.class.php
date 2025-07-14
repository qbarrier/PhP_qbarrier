#!/c/xampp/php/php
<?php

class Jaime extends Lannister {
    function sleepwith($who)
    {
        if ($who instanceof Cersei)
        {
            print("With pleasure, but only in a tower in Winterfell, then.\n");
        }
        elseif ($who instanceof Tyrion)
        {
            print("Not even if I'm drunk !\n");
        }
        else
            print("Let's do this.\n");

    }
}