<?php
class Circle {
    private $r;
    private $area;
    private $circumference;

    function __construct(float $r) {
        $this->valSet($r);
    }
    function valSet(float $r){                               //Sets up a circle.
        if($r<0) trigger_error("Object 'Circle' refuses negative values.",E_USER_NOTICE);
        $this->r=$r;                                      //asign all variables
        $this->area=$this->area ($r);
        $this->circumference=$this->circumference($r);
    }

    private function area ($r){                            //Calculates area.
        return pi()*$r*$r;
    }

	private function circumference($r){                     //Calculate circumference.
		return 2*$r*pi();
	}


    function __get(string $var){
        if(!($var=='r' or $var=='area' or $var=='circumference')) trigger_error("Object 'circle' has no such property.",E_USER_NOTICE);
        return $this->$var;
    }

}
?>