<?php
    session_start();
	require_once('CircleClass.php');
	require_once('TriangleClass.php');
    function valjaneDuljineStranica ($a,$b,$c){
		return ($a+$b>=$c and $b+$c>=$a and $a+$c>=$b);
	}
    function pk($r){
    	$pi=pi();
		return $pi*$r^2;
	}
	function ok($r){
		return 2*$r*pi();
	}
    function pts($a,$b,$c){
		$p=($a+$b+$c)/2;
		$pts=sqrt($p*($p-$a)*($p-$b)*($p-$c));
		return $pts;
	}
	function ptv($a,$v){
		echo"$a,$v-ptv<br />";
		return $a*$v/2;
	}
	function ptsv($a,$b,$c,$v,$x){
		//global $$a;
		$pts=pts($a,$b,$c);
		$ptv=ptv($$x,$v);
		$pomoc=$$x;
		echo"$a,$b,$c,$v,$pomoc -ptsv<br />";
		if(round($pts,6)==round($ptv,6)){
			return $pts;// . ', ' . $ptv;
		}
		return 'Nemoguća visina trokuta!';
	}
	function pt($a,$b,$c,$v){
		if(!valjaneDuljineStranica ($a,$b,$c)){	//ako dotične stranice ne čine trokut
			return 'Neispravne duljine stranica';
		} else {								//ako su duljine stranica ispravne
			$max=max($a,$b,$c);	//Najdulja stranica (hipotenuza)
			$pmaxv=$max*$v/2;	//Površina trokutaviz hipotenuze i pripadajuće visine
			$pts=pts($a,$b,$c);	//Površina trokuta iz duljina stranica
			if(round($pts,6)==round($pmaxv,6)){	//ako su površine iste (o jest, ako je visina ispravna za taj trokut)
				return $max*$v/2;
			} else {
				return 'Neispravna visina na hipotenuzu';
			}
			
		}
		
	}
	function ot($a,$b,$c){
		if(!valjaneDuljineStranica ($a,$b,$c)){	//ako dotične stranice ne čine trokut
			return 'Neispravne duljine stranica';
		}
		return $a+$b+$c;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Test klasa Trokut i Krug</title>
	</head>
	<style>
		* {
			font-size: 100%;
			font-family: Courier New;
		}
	</style>
	<body>
		<?php
            if(isset($_REQUEST['radius'])){
            	if(is_numeric($_REQUEST['radius'])){
					$r=$_REQUEST['radius'];
					$circle= new Circle($r);
            		//$pk=pk($r);
            		//$ok=ok($r);
            		$pk=$circle->__get('area');
            		$ok=$circle->__get('circumference');
            		
				} else {
					$r='nedefiniran';
					$pk='neiračunjiv';
				}
            	$pi=pi();
				echo "<div>Krug (r=$r)<br />Površina kruga je: $pk($pi)<br />Opseg kruga je: $ok</div><br /><br />";
			}
            if(isset($_REQUEST['a'])){
            	if(is_numeric($_REQUEST['a']))$a=$_REQUEST['a']; else $a=0;
            	if(is_numeric($_REQUEST['b']))$b=$_REQUEST['b']; else $b=0;
            	if(is_numeric($_REQUEST['c']))$c=$_REQUEST['c']; else $c=0;
				if(is_numeric($_REQUEST['v']))$v=$_REQUEST['v']; else $v=0;
				$trokut= new Triangle($a,$b,$c,$v);
				//$pt=pt($a,$b,$c,$v);
				$pt=$trokut->__get('area');
				//echo"$a,$b,$c,$v,$vx-main<br />";
				//echo pts($a,$b,$c) . '-<br />';
				//echo ptv($$vx,$v) . '-<br />';
				//echo ptsv($a,$b,$c,$v,$vx) . '-<br />';
				//$ot=ot($a,$b,$c);
				$ot=$trokut->__get('circumference');
            	echo "<div>Trokut(a=$a, b=$b, c=$c, v<sub style='font-size: 70%;'>h</sub>=$v)<br />Površina trokuta je: $pt<br />Opseg trokuta je: $ot</div><br /><br />";
			}
        ?>
    	<form action="index.php" method="get">
    		<label for="">Krug</label><br />
    		r: <input id="radius" name="radius" type="text" /><br />
    		<input type="submit" />
    	</form>
    	<br /><br />
    	<form action="index.php" method="get">
    		<label for="">Trokut</label><br />
    		a:&nbsp <input id="a" name="a" type="text" /><br />
    		b:&nbsp <input id="b" name="b" type="text" /><br />
    		c:&nbsp <input id="c" name="c" type="text" /><br />
    		v<sub>h</sub>: <input id="vx" name="v" type="text" /><br />
    		<input type="submit" />
    	</form>
	</body>
</html>
