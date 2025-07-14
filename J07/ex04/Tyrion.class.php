#!/c/xampp/php/php
<?php

class Tyrion extends Lannister {
    function sleepwith($who)
    {
        if ($who instanceof Lannister)
        {
            print("Not even if I'm drunk !\n");
        }
        else
            print("Let's do this.\n");

    }
}