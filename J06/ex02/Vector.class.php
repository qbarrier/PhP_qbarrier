#!/c/xampp/php/php
<?php

require_once '../ex00/Color.class.php';
require_once '../ex01/Vertex.class.php';

class Vector {

    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    static $verbose = False;

    function __construct($vector)
    {
        if (isset($vector['dest']))   
        {
            if (!(isset($vector['orig'])))
            {
                $vector['orig'] = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );       
            }
            $this->_x = $vector['dest']->getX() - $vector['orig']->getX();
            $this->_y = $vector['dest']->getY() - $vector['orig']->getY();
            $this->_z = $vector['dest']->getZ() - $vector['orig']->getZ();
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

   function __toString() {
        return (sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    static function doc() {
        if (file_exists("Vector.doc.txt"))
        {
        $read = fopen("Vector.doc.txt" ,'r');
        while ($buffer = fgets($read))
        {
            echo $buffer;
        }
        fclose($read);
        }
    }

    public function magnitude() {
        return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
    }

    public function normalize() {
        $mag = $this->magnitude();
        if ($mag == 1)
            return (clone $this);
        $new_vertex = new Vertex( array( 'x' => $this->_x / $mag, 'y' => $this->_y / $mag, 'z' => $this->_z / $mag ) );
        return (new Vector( array( 'dest' => $new_vertex ) ) );
    }

    public function add($rhs) {
        $new_vertex = new Vertex( array( 'x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z ) );
        return (new Vector( array( 'dest' => $new_vertex ) ) );
    }

    public function sub($rhs) {
        $new_vertex = new Vertex( array( 'x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z ) );
        return (new Vector( array( 'dest' => $new_vertex ) ) );
    }

    public function opposite() {
        $new_vertex = new Vertex( array( 'x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1 ) );
        return (new Vector( array( 'dest' => $new_vertex ) ) );
    }

    public function scalarProduct($k) {
        $new_vertex = new Vertex( array( 'x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k ) );
        return (new Vector( array( 'dest' => $new_vertex ) ) );
    }

    public function dotProduct($rhs) {
        return ($this->_x * $rhs->_x + $this->_y * $rhs->_y + $this->_z * $rhs->_z);
    }

    public function cos($rhs) {
        $scal = $this->dotProduct($rhs);
        $norme_total = $this->magnitude() * $rhs->magnitude();
        return ($scal / $norme_total);
    }

    public function crossProduct($rhs) {
        $new_x = ($this->_y * $rhs->_z) - ($this->_z * $rhs->_y);
        $new_y = ($this->_z * $rhs->_x) - ($this->_x * $rhs->_z);
        $new_z = ($this->_x * $rhs->_y) - ($this->_y * $rhs->_x);
        $new_vertex = new Vertex( array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z ) );
        return (new Vector( array( 'dest' => $new_vertex ) ) );
    }

    public function getX() {
        return $this->_x;
    }

    public function getY() {
        return $this->_y;
    }

    public function getZ() {
        return $this->_z;
    }
    
    public function getW() {
        return $this->_w;
    }
}