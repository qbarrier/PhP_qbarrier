#!/c/xampp/php/php
<?php

require_once '../ex00/Color.class.php';
require_once '../ex01/Vertex.class.php';
require_once '../ex02/Vector.class.php';


class Matrix {

    const IDENTITY = "IDENTITY";
    const SCALE = "SCALE";
    const RX = "RX";
    const RY = "RY";
    const RZ = "RZ";
    const TRANSLATION = "TRANSLATION";
    const PROJECTION = "PROJECTION";

    private $_matrix = array(   0, 0, 0, 0, 
                                0, 0, 0, 0, 
                                0, 0, 0, 0, 
                                0, 0, 0, 1);
    private $_preset;
    private $_scale;
    private $_angle;
    private $_vtc;
    private $_fov;
    private $_ratio;
    private $_near;
    private $_far;
    static $verbose = FALSE;

    function __construct($tab)
    {
        if (isset($tab['preset']))
        {
            $this->_preset = $tab['preset'];
            if (isset($tab['scale']))
                $this->_scale = $tab['scale'];
            if (isset($tab['angle']))
                $this->_angle = $tab['angle'];
            if (isset($tab['vtc']))
                $this->_vtc = $tab['vtc'];
            if (isset($tab['fov']))
                $this->_fov = $tab['fov'];
            if (isset($tab['ratio']))
                $this->_ratio = $tab['ratio'];
            if (isset($tab['near']))
                $this->_near = $tab['near'];
            if (isset($tab['far']))
                $this->_far = $tab['far'];   
            $this->ft_parsing();
            if (Self::$verbose)
            {
                echo "Matrix $this->_preset preset instance constructed\n";
            }
        }
    }

    function __destruct()
    {
        if (Self::$verbose)
        {
            echo "Matrix instance destructed\n";
        }
    }

   function __toString() {
        $str = "M | vtcX | vtcY | vtcZ | vtxO\n";
        $str .= "-----------------------------\n";
        $str .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
        $str .= "w | %0.2f | %0.2f | %0.2f | %0.2f\n";
        return (sprintf($str,   $this->_matrix[0],   $this->_matrix[1],   $this->_matrix[2],   $this->_matrix[3], 
                                $this->_matrix[4],   $this->_matrix[5],   $this->_matrix[6],   $this->_matrix[7], 
                                $this->_matrix[8],   $this->_matrix[9],   $this->_matrix[10],  $this->_matrix[11], 
                                $this->_matrix[12],  $this->_matrix[13],  $this->_matrix[14],   $this->_matrix[15]));
    }

    static function doc() {
        if (file_exists("Matrix.doc.txt"))
        {
        $read = fopen("Matrix.doc.txt" ,'r');
        while ($buffer = fgets($read))
        {
            echo $buffer;
        }
        fclose($read);
        }
    }

    private function ft_parsing() {
        switch($this->_preset) {
            case ($this->_preset == "IDENTITY"):
                $this->ft_identity(1);
                break;
            case ($this->_preset == "SCALE" && isset($this->_scale)):
                $this->ft_identity($this->_scale);
                break;
            case ($this->_preset == "RX" && isset($this->_angle)):
                $this->ft_rotation_x();
                break;
            case ($this->_preset == "RY" && isset($this->_angle)):
                $this->ft_rotation_y();
                break;
            case ($this->_preset == "RZ" && isset($this->_angle)):
                $this->ft_rotation_z();
                break;
            case ($this->_preset == "TRANSLATION" && isset($this->_vtc)):
                $this->ft_translation();
                break;
            case ($this->_preset == "PROJECTION" && isset($this->_fov) && isset($this->_ratio) && isset($this->_near) && isset($this->_far)):
                $this->ft_projection();
                break;
        }
    }

    private function ft_identity($scale) {
        $this->_matrix[0] = $scale;
        $this->_matrix[5] = $scale;
        $this->_matrix[10] = $scale;
    }

    private function ft_translation() {
        $this->ft_identity(1);
        $this->_matrix[3] = $this->_vtc->getX();
        $this->_matrix[7] = $this->_vtc->getY();
        $this->_matrix[11] = $this->_vtc->getZ();
    }

    private function ft_rotation_x() {
        $this->ft_identity(1);
        $this->_matrix[5] = cos($this->_angle);
        $this->_matrix[6] = -sin($this->_angle);
        $this->_matrix[9] = sin($this->_angle);
        $this->_matrix[10] = cos($this->_angle);
    }
    
    private function ft_rotation_y() {
        $this->ft_identity(1);
        $this->_matrix[0] = cos($this->_angle);
        $this->_matrix[2] = sin($this->_angle);
        $this->_matrix[8] = -sin($this->_angle);
        $this->_matrix[10] = cos($this->_angle);
    }
    
    private function ft_rotation_z() {
        $this->ft_identity(1);
        $this->_matrix[0] = cos($this->_angle);
        $this->_matrix[1] = -sin($this->_angle);
        $this->_matrix[4] = sin($this->_angle);
        $this->_matrix[5] = cos($this->_angle);
    }

    private function ft_projection() {
        $this->ft_identity(1);
        $this->_matrix[5] = ( 1 / tan( deg2rad($this->_fov) / 2) );
        $this->_matrix[0] = $this->_matrix[5] / $this->_ratio;
        $this->_matrix[10] = - ($this->_far + $this->_near) / ($this->_far - $this->_near);
        $this->_matrix[11] = - (2 * $this->_far * $this->_near) / ($this->_far - $this->_near);
        $this->_matrix[14] = -1;
        $this->_matrix[15] = 0;
    }

    public function mult(Matrix $rhs) {
        $tmp =  array(  0, 0, 0, 0, 
                        0, 0, 0, 0, 
                        0, 0, 0, 0, 
                        0, 0, 0, 0);

        for ($i = 0; $i < 16; $i += 4)
        {
            for ($j = 0; $j < 4; $j++)
            {
                $tmp[$i + $j] = $this->_matrix[$i] * $rhs->_matrix[$j];
                $tmp[$i + $j] += $this->_matrix[$i + 1] * $rhs->_matrix[$j + 4];
                $tmp[$i + $j] += $this->_matrix[$i + 2] * $rhs->_matrix[$j + 8];
                $tmp[$i + $j] += $this->_matrix[$i + 3] * $rhs->_matrix[$j + 12];
            }
        }
        $new_matrix = new Matrix(array( 'preset' => Matrix::IDENTITY ) );
        $new_matrix->_matrix = $tmp;
        return($new_matrix);
    }

    public function transformVertex(Vertex $vtx)
    {
        $tmp = array();
        $tmp['x'] = ($vtx->getX() * $this->_matrix[0]) + ($vtx->getY() * $this->_matrix[1]) + ($vtx->getZ() * $this->_matrix[2]) + ($vtx->getW() * $this->_matrix[3]);
        $tmp['y'] = ($vtx->getX() * $this->_matrix[4]) + ($vtx->getY() * $this->_matrix[5]) + ($vtx->getZ() * $this->_matrix[6]) + ($vtx->getW() * $this->_matrix[7]);
        $tmp['z'] = ($vtx->getX() * $this->_matrix[8]) + ($vtx->getY() * $this->_matrix[9]) + ($vtx->getZ() * $this->_matrix[10]) + ($vtx->getW() * $this->_matrix[11]);
        $tmp['w'] = ($vtx->getX() * $this->_matrix[11]) + ($vtx->getY() * $this->_matrix[13]) + ($vtx->getZ() * $this->_matrix[14]) + ($vtx->getW() * $this->_matrix[15]);
        $tmp['color'] = $vtx->getColor();
        $new_vertex = new Vertex($tmp);
        return ($new_vertex);
    }

}