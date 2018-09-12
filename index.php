<?php
    session_start();
    include_once "CircleClass.php";
    include_once "TriangleClass.php";
    function valjanTrokut ($a,$b,$c){
		If($a>$b){
			$max=$a;
			$min=$b;
		} else
		{
			$max=$b;
			$min=$a;
		}
		if($max<$c){
			$mid=$max;
			$max=$c;
		}
		if($min>$c){
			$mid=$min;
			$min=$c;
		}
		return ($max-$mid-$min<=0);
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
		echo"$a,$b,$c-pts<br />";
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
	function ot($a,$b,$c){
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
            		$pk=pk($r);
            		$ok=ok($r);
            		
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
            	if($_REQUEST['radiov']=='a' or $_REQUEST['radiov']=='b' or $_REQUEST['radiov']=='c'){
            		$vx=$_REQUEST['radiov'];
            		$ptsv=ptsv($a,$b,$c,$v,$vx);
            		echo"$a,$b,$c,$v,$vx-main<br />";
            		//echo pts($a,$b,$c) . '-<br />';
            		//echo ptv($$vx,$v) . '-<br />';
            		//echo ptsv($a,$b,$c,$v,$vx) . '-<br />';
            		$ot=ot($a,$b,$c);
				} else {
            		$vx='x';
            		$v='nedefiniran';
            	}
            	echo "<div>Trokut(a=$a, b=$b, c=$c, v<sub>$vx</sub>=$v)<br />Površina trokuta je: $ptsv<br />Opseg trokuta je: $ot</div><br /><br />";
			}
        ?>
    	<form action="index.php" method="get">
    		<label for="">Krug</label><br />
    		r: <input id="radius" name="radius" type="text" /><br />
    		<label id="KrugOutput" for=""></label><br />
    		<input type="submit" />
    	</form>
    	<br /><br />
    	<form action="index.php" method="get">
    		<label for="">Trokut</label><br />
    		a:&nbsp <input id="a" name="a" type="text" /><br />
    		b:&nbsp <input id="b" name="b" type="text" /><br />
    		c:&nbsp <input id="c" name="c" type="text" /><br />
    		v<sub>x</sub>: <input id="vx" name="v" type="text" /><br />
    		<label id="KrugOutput" for=""></label><br />
    		<label>v<sub>a</sub><input name="radiov" type="radio" value="a" checked /></label><br />
    		<label>v<sub>b</sub><input name="radiov" type="radio" value="b" /></label><br />
    		<label>v<sub>c</sub><input name="radiov" type="radio" value="c" /></label><br />
    		<input type="submit" />
    	</form>
	</body>
</html>
