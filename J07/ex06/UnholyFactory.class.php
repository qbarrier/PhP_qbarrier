#!/c/xampp/php/php
<?php

class UnholyFactory {
    
    private $_fighter = array();

    public function absorb($soldier_type)
    {
        if ($soldier_type instanceof Fighter)
        {
            
            if (in_array($soldier_type, $this->_fighter))
            {
                printf("(Factory already absorbed a fighter of type %s)\n", $soldier_type->name);
            }
            else
            {
                $this->_fighter[] = $soldier_type;
                printf("(Factory absorbed a fighter of type %s)\n", $soldier_type->name);
            }
        }
        else
            print("(Factory can't absorb this, it's not a fighter)\n");
    }

    public function fabricate($name) {
  
        foreach ($this->_fighter as $f_type)
        {
            if ($f_type->name == $name)
            {
                printf("(Factory fabricates a fighter of type %s)\n", $name);
                return ($f_type);
            }
        }

        printf("(Factory hasn't absorbed any fighter of type %s)\n", $name);
        return (null);
                
    }
}