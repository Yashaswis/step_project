<?php


require_once('dbclass/database.php');
$dbclass=new database();
date_default_timezone_set( 'Asia/calcutta' );
@extract($_REQUEST);
 $finalstring=$z;
 $inserttime=date('dmyHis');
 
 
 
 
function between($str,$start,$end){
 $str2=substr($str, $start, $end);
 return htmlspecialchars($str2,ENT_QUOTES);
 
}

function left($str, $length) {
     $str2= substr($str, 0, $length);
 return htmlspecialchars($str2,ENT_QUOTES);	 
}

function right($str, $length) {
     $str2= substr($str, -$length);
	  return htmlspecialchars($str2,ENT_QUOTES);	 
}
$genno=$z;
    $running= between($finalstring,20,1);
	$fuel=between($finalstring,21,1);
	$fueldiscrate=between($finalstring,22,3);
	$temprature=between($finalstring,25,3);
	$vr=between($finalstring,28,3);
	$vy=between($finalstring,31,3);
	$vb=between($finalstring,34,3);
	$fuellevel=between($finalstring,37,4);
	$lat=between($finalstring,41,10);
	$long=between($finalstring,51,11);
	$speed=between($finalstring,62,3);
	$batvat=between($finalstring,65,3);
	$genbatvtg=between($finalstring,68,3);
	$oilpressure=between($finalstring,71,4);
	$remarks=right($finalstring,-75);
	
        // /* $datestring= substr($inserttime, 0, -4);
		 // $timestring= substr($inserttime, -4);*/
		  
		  
		 // $datestring= substr($inserttime, 0, -6);
		 // echo "<br>";
		
		//  $timestring1= substr($inserttime, -4);
		
		 //  $timestring=$timestring1."00";
		  
		  $datestring= substr($inserttime, 0, -6);
          $timestring= substr($inserttime, -6);
		  
		  
//echo 'AFRMS1001712345678991000003332232232200421253.2891N07734.0392E000120120000';

if($z!=''){

mysql_query("INSERT INTO apsisdatatest1test1 (genno ,dataandtime ,running ,fuel ,fueldiscrate ,temprature ,vr ,vy ,vb ,fuellevel ,lat ,longt ,speed ,batvat ,genbatvtg ,oilpressure ,remarks,entdate,datestring,timestring)
VALUES ('$genno', '$inserttime', '$running', '$fuel', '$fueldiscrate', '$temprature', '$vr', '$vy', '$vb', '$fuellevel', '$lat', '$long', '$speed', '$batvat', '$genbatvtg', '$oilpressure', '$remarks',now(),'$datestring','$timestring')");

mysql_query("insert into apsisrecordtest7(comstring,entdate,inserttime) VALUES ('$finalstring',now(),'$inserttime')") ;

echo "RIS=*".$inserttime."<'.$finalstring.'>";

}
else
{
//echo "RIS=*".$inserttime."!!<'$finalstring'";  
$conn = new mysqli("localhost","inverset_Ayash", "Ayash@1234","inverset_ayash_db_vehicle");
$sql = "SELECT * FROM apsisrecordtest7 ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$printtime = $row["inserttime"];
        $print = $row["comstring"];
        echo  "~^RIS=*".$printtime."<'.$print.'>";
    }
}
    
mysqli_close($conn);  
}

?>