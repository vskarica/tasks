<?php
    session_start();
	//require_once('CircleClass.php');
	//require_once('TriangleClass.php');
	require('CircleClass.php');
	require('TriangleClass.php');
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
		.sub{
			font-size: 70%;
		}
	</style>
	<body>
		<?php
            if(isset($_REQUEST['radius'])){
            	if(is_numeric($_REQUEST['radius'])){
					$r=$_REQUEST['radius'];
					$circle= new Circle($r);
            		$pk=$circle->__get('area');
            		$ok=$circle->__get('circumference');
            		
				} else {
					$r='nedefiniran';
					$pk='neizračunjiv';
					$ok='neizračunjiv';
				}
				echo "<div>Krug (r=$r)<br />Površina kruga je: $pk<br />Opseg kruga je: $ok</div><br /><br />";
			}
            if(isset($_REQUEST['a'])){
            	if(is_numeric($_REQUEST['a']))$a=$_REQUEST['a']; else $a=0;
            	if(is_numeric($_REQUEST['b']))$b=$_REQUEST['b']; else $b=0;
            	if(is_numeric($_REQUEST['c']))$c=$_REQUEST['c']; else $c=0;
				if(is_numeric($_REQUEST['v']))$v=$_REQUEST['v']; else $v=0;
				$trokut= new Triangle($a,$b,$c,$v);
				$pt=$trokut->__get('area');
				$ot=$trokut->__get('circumference');
            	echo "<div>Trokut(a=$a, b=$b, c=$c, v<sub class='sub'>h</sub>=$v)<br />Površina trokuta je: $pt<br />Opseg trokuta je: $ot</div><br /><br />";
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
