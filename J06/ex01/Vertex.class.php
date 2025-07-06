#!/c/xampp/php/php
<?php

require_once '../ex00/Color.class.php';

class Vertex {

    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;
    static $verbose = False;

    public function __construct($vertex)
    {
        if (isset($vertex['x']) && isset($vertex['y']) && isset($vertex['z']))
        {
            $this->_x = $vertex['x'];
            $this->_y = $vertex['y'];
            $this->_z = $vertex['z'];
        }
        if (isset($vertex['w']))
        {
            $this->_w = $vertex['w'];
        }
        if (isset($vertex['color']))   
        {
            $this->_color = $vertex['color'];
        }
        else
        {
            $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
        }
        if (Self::$verbose)
        {
            echo Self::__toString() . " construct\n";
        }
    }

    function __destruct()
    {
        if (Self::$verbose)
        {
            echo Self::__toString() . " deconstruct\n";
        }
    }

    static function doc() {
        if (file_exists("Vertex.doc.txt"))
        {
            $read = fopen("Vertex.doc.txt" ,'r');
            while ($buffer = fgets($read))
            {
                echo $buffer;
            }
            fclose($read);
        }
    } 
    
    function __toString() {
        if (Self::$verbose)
            return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
        return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    public function getX() 
    {
        return $this->_x;
    }

    public function setX($x)
    {
        $this->_x = $x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function setY($y)
    {
        $this->_y = $y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function setZ($z)
    {
        $this->_z = $z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function setW($w)
    {
        $this->_w = $w;
    }

    public function getColor()
    {
        return $this->_color;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }
}