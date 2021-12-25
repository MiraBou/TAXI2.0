<?php
error_reporting(0);


$matr = array
  (
    array("L'mdina",0,10000,5,20,20,20,10000),
    array("Lissasefa",10000,0,10,10,15,15,7),
    array("Maarif",5,10,0,15,10000,15,10),
    array("Oulfa",20,10,15,0,10000,5,10000),
    array("Ain Diab",20,15,10000,10000,0,5,10000),
    array("Hay Hassani",20,15,15,5,5,0,10000),
    array("Sidi Maarouf",10000,7,10,10000,10000,10000,0),

  );


if (isset($_POST['source']) && isset($_POST['destination'])) {
  include 'header.php';


$cost=array();
$visite=array();
$destination=$_POST['destination'];
$pivot=array();
$chemin=array();
$n=7;
$INFINI=10000;
for($j=1,$i=0;$j<$n+1;$j++){
		if($j-1==$_POST['source']){
			$cost[$i][$j-1]=0;
			$chemin[$i][$j-1]=0;
		}
		else{
			 $cost[$i][$j-1]=$INFINI;
			 $chemin[$i][$j-1]=$INFINI;
		}
}

$pivot[0]=0;

$visite[0]=$_POST['source'];

$k=0;

 for ($col = 0; $col < $n	; $col++) {
    //echo "  ".$cost[0][$col]."  ";
  }
  //echo "<br>";
//Djikstra
for ($i=1; $i <$n ; $i++) {
					for ($j=0; $j <$n ; $j++) {

											$r=$visite[$k];
										          $c=0;
										          $io=0;
											while($visite[$io]!=$j && $io<=$k)$io++;
											if($io<=$k)$c=1;



										if($c==1){$cost[$i][$j]=10000;}
										else
											{		if ($cost[$i-1][$j]<=$pivot[$k]+$matr[$r][$j+1]) {
																$cost[$i][$j]=$cost[$i-1][$j];
															 	$chemin[$i][$j]=$chemin[$i-1][$j];
																	}



													else{
																$cost[$i][$j]=$pivot[$k]+$matr[$r][$j+1];
																$chemin[$i][$j]=$visite[$k];

														}

											}
												//echo "  ".$cost[$i][$j]."   ";
										}
//echo "<br>";
					$min=10000;//1million
					for($j=0; $j <$n ; $j++){
										if($cost[$i][$j]!=10000){
																		if($cost[$i][$j]<$min){
																			$min=$cost[$i][$j];
																			$indice=$j;}

																								}

											}

					$k++;
					$pivot[$k]=$min;
					$visite[$k]=$indice;




}

$i=0;

while($i<$n && $_POST['destination']!=$visite[$i])
{$i++;}
if($_POST['destination']==$visite[$i])
{
echo'<div id="left2"><div id="container1">La durée du plus court chemin de<br><br>'.$matr[$_POST['source']][0]." à ".$matr[$_POST['destination']][0]." est :<br><br><span style='color:blue;'>".$pivot[$i].' minute(s)</span><br>';
echo'<form action="trait.php">
<input type="submit" value="Voulez-vous choisir un autre circuit ?">
 </form>';
}
else echo"Il n y a aucun chemin reliant ces deux places !";
//Affichage des sommets qui consistuent le plus court chemin
$char=$matr[$destination][0];
$j=0;
while ($j<$n && $destination!=$visite[0]) {
	if ($destination==$j) {
								$index=0;
								while($j!=$visite[$index] && $index<$n)$index++;
								if($index<$n)$c=$index;

							$destination=$chemin[$c][$j];
							$char=$matr[$destination][0]." <span style='color:blue;'>--(".$matr[$destination][$j+1]."mn)--></span> ".$char;
							$j=0;

						  }
	else $j++;
}

echo "</div></div>";

include 'result.php';
if ($_POST['source']!=$_POST['destination']) {
echo"<span id='chemin'>Votre circuit est : <br><br> ".$char."</span> ";
}
else {
  echo"<span id='chemin'>Vous êtes actuellement dans votre destination ! <br><br> ".$char."</span> ";
}
echo'</div></div></div></div></body></html>';

}

else{
  $host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';
header("Location: http://$host$uri/$extra");
}
?>
