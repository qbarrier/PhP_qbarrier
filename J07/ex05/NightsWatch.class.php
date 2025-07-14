#!/c/xampp/php/php
<?php

class NightsWatch {

    private $_recrue = array();

    public function recruit($n)
    {
       $this->_recrue[] = $n;
    }

    public function fight() {
        foreach ($this->_recrue as $n)
        {
            if (method_exists($n, 'fight'))
            {
                $n->fight();
            }
        }
    }
}