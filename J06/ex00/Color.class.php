#!/c/xampp/php/php
<?php
class Color {

    public $red, $green, $blue;
    static $verbose = False;

    public function __construct($color) {
        if (isset($color['rgb']))
        {
                $rgb = intval($color["rgb"]);
                $this->red = ($rgb / 65281) % 256;
                $this->green = ($rgb / 256) % 256;
                $this->blue = $rgb % 256;
        }
        elseif (isset($color['red']) && isset($color['green']) && isset($color['blue']))
        {
                $this->red = intval($color['red']);
                $this->green = intval($color['green']);
                $this->blue = intval($color['blue']);
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
        return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
    }

    static function doc() {
        if (file_exists("Color.doc.txt"))
        {
            $read = fopen("Color.doc.txt" ,'r');
            while ($buffer = fgets($read))
            {
                echo $buffer;
            }
            fclose($read);
        }
    } 

    function add($Color) {
        return (new Color(array("red" => $this->red + $Color->red,  "green" => $this->green + $Color->green,  "blue" => $this->blue + $Color->blue)));
    }

    function sub($Color) {
        return (new Color(array("red" => $this->red - $Color->red,  "green" => $this->green - $Color->green,  "blue" => $this->blue - $Color->blue)));
    }

    function mult($mult) {
        return (new Color(array("red" => $this->red * $mult,  "green" => $this->green * $mult,  "blue" => $this->blue * $mult)));
    }

}