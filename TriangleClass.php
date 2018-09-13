<?php
class Triangle {
    private $a;
    private $b;
    private $c;
    private $v;
    private $area;
    private $circumference;
    //private $aSet=0;
    //private $bSet=0;
    //private $cSet=0;

    /*function __construct() {
    }*/
    function __construct(float $a, float $b, float $c, float $v) {
        $this->valSet($a,$b,$c,$v);
    }
    function valSet(float $a, float $b, float $c, float $v){    //Sets up a triangle.
        if(!$this->isSidesLenghtRight ($a,$b,$c)) trigger_error("Object 'Triangle' received impossible combination of side lengths.",E_USER_NOTICE);
        if($a<0 or $b<0 or $c<0 or $v<0) trigger_error("Object 'Triangle' refuses negative values.",E_USER_NOTICE);
        $pv=$this->triangleHeightArea ($a,$v);                  //area by height
        $ps=$this->triangleSidesArea ($a,$b,$c);                //area by sides
        if(round($pv,6)==round($ps,6)){                         //if areas equal
            $this->a=$a;                                        //asign all variables
            $this->b=$b;
            $this->c=$c;
            $this->v=$v;
            $this->area=$pv;
            $this->circumference=$this->circumference($a,$b,$c);
        } else trigger_error("Object 'circle', Current combination of height and side lengths is impossible."/* . round($pv,6) . "==" . round($ps,6) */,E_USER_NOTICE);
    }

 
    private function isSidesLenghtRight ($a,$b,$c){         //Determines if lengths of sides permits building a triangle.
        return ($a+$b>=$c and $b+$c>=$a and $a+$c>=$b);
    }

    private function triangleSidesArea ($a,$b,$c){          //Calculates area by sides.
        $p=($a+$b+$c)/2;
        $area=sqrt($p*($p-$a)*($p-$b)*($p-$c));
        return $area;
    }

    private function triangleHeightArea ($a,$v){            //Calculate area by height and corresponding side.
        return $a*$v/2;
    }

	private function circumference($a,$b,$c){               //Calculate circumference of triangle.
		return $a+$b+$c;
	}


    function __get(string $var){
        if(!($var='a' or $var='b' or $var='c' or $var='v' or $var='area' or $var='circumference')) trigger_error("Object 'circle' has no such property.",E_USER_NOTICE);
        return $this->$var;
    }
    /*function __set(string $var,float $val){
        if(!($var='a' or $var='b' or $var='c' or $var='v')) trigger_error("Object 'circle' has no such propertie",E_USER_NOTICE);
        if(!is_numeric($val)) trigger_error("Object 'circle' can receive onli numeric values",E_USER_NOTICE);
        if($var='a')$aSet=1;
        if($var='b')$bSet=1;
        if($var='c')$cSet=1;
        if($var='v')$vSet=1;
        if($aSet+$bSet+$cSet=3){
            if(!isSidesLenghtRight($this->a,$this->b,$this->c)) trigger_error("Object 'circle' recived imposibe combination of side lenghts",E_USER_NOTICE);
        }
        $this->$var=$val;
    }*/
}
?>