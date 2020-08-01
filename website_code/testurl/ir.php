<?php


require_once('dbclass/database.php');
$dbclass=new database();
date_default_timezone_set( 'Asia/calcutta' );
@extract($_REQUEST);
 $finalstring=$z;
 $inserttime=date('dmyHis');
 
 $vehicle_id = between($finalstring,0,6);
 $g_location = between($finalstring,6,3);
 $pub_key    = '123456789';
 $pri_key    = '123456780';
 $Longi_D     = between($finalstring,39,7);
 $Lati_D     = between($finalstring,32,7);
 $rain       = between($finalstring,12,4);
 $Acc_Data_X   = between($finalstring,20,4);
 $Acc_Data_Y  = between($finalstring,24,4);
 $Acc_Data_Z   = between($finalstring,28,4);
 $Traffic_Sensor =between($finalstring,16,4);
 $Misc       = between($finalstring,46,6);
 $Entry_Key       = between($finalstring,9,3);
 
// echo $vehicle_id  ;
 // echo "<br>";
// echo      $g_location ;
 // echo "<br>";
   // echo    $pub_key    ;
    // echo "<br>";
  // echo     $pri_key    ;
   // echo "<br>";
 // echo      $Longi_D    ; 
  // echo "<br>";
 // echo      $Lati_D    ; 
  // echo "<br>";
 // echo     $rain     ;  
  // echo "<br>";
  // echo     $Acc_Data  ; 
   // echo "<br>";
 // echo      $Misc      ; 
  // echo "asdf <br>";
 
 
 
 
 
 
 
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
	
         /* $datestring= substr($inserttime, 0, -4);
		  $timestring= substr($inserttime, -4);*/
		  
		  
		 // $datestring= substr($inserttime, 0, -6);
		 // echo "<br>";
		
		//  $timestring1= substr($inserttime, -4);
		
		 //  $timestring=$timestring1."00";
		  
		  $datestring= substr($inserttime, 0, -6);
          $timestring= substr($inserttime, -6);
		  
		  
//echo 'AFRMS1001712345678991000003332232232200421253.2891N07734.0392E000120120000';

if ($z=='123456780') //private
{
	//echo "RIS=*".$inserttime."!!<'$finalstring'";  
	$conn = new mysqli("localhost","inverset_Ayash", "Ayash@1234","inverset_ayash_db_vehicle");
	$sql = "SELECT * FROM apsisrecordtest8 ORDER BY SL_No DESC LIMIT 10";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$printtime = $row["inserttime"];
			$print = $row["vehicleid"];
			echo  "~^RIS=*".$printtime.$row['vehicleid'].$row["glocation"].$row["EntryKey"].$row["rain"].$row["TrafficSensor"].$row["Acc_DataX"].$row["Acc_DataY"].$row["Acc_DataZ"].$row["Lati"].$row["Longi"].$row["misc"];
			echo "<br>";
		}																							
	}
 mysqli_close($conn);
}
elseif ($z=='123456789')
{
	//echo "RIS=*".$inserttime."!!<'$finalstring'";  
	$conn = new mysqli("localhost","inverset_Ayash", "Ayash@1234","inverset_ayash_db_vehicle");
	$sql = "SELECT * FROM apsisrecordtest8 ORDER BY SL_No DESC LIMIT 10";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$printtime = $row["inserttime"];
			$print = $row["vehicleid"];
			echo  "~^RIS=*".$printtime.$row["glocation"].$row["EntryKey"].$row["rain"].$row["TrafficSensor"].$row["Acc_DataX"].$row["Acc_DataY"].$row["Acc_DataZ"].$row["Lati"].$row["Longi"].$row["misc"];
			echo "<br>";
		}																							
	}
 mysqli_close($conn);
}
//elseif($z!='')
elseif(strlen($z)==46 && $Entry_Key =="KEY")
{
	mysql_query("insert into apsisrecordtest8 (entdate,inserttime,vehicleid,glocation,EntryKey,pubkey,prikey,Longi,Lati,rain,Acc_DataX,Acc_DataY,Acc_DataZ,misc,TrafficSensor) VALUES (now(),'$inserttime','$vehicle_id','$g_location','$Entry_Key','$pub_key','$pri_key','$Longi_D','$Lati_D','$rain','$Acc_Data_X','$Acc_Data_Y','$Acc_Data_Z','$Misc','$Traffic_Sensor')") ;
	echo "~~^RIS=*".$inserttime."<'.$finalstring.'>";
//	echo "Length =",strlen($z);
}

else
{
// echo "RIS=*".$inserttime."!!<'$finalstring'";  
	$conn = new mysqli("localhost","inverset_Ayash", "Ayash@1234","inverset_ayash_db_vehicle");
$sql = "SELECT * FROM apsisrecordtest8 ORDER BY SL_No DESC LIMIT 1";
$result = $conn->query($sql);
// echo $result;
// echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$printtime = $row["inserttime"];
        $print = $row["vehicleid"];
        echo  "~^RIS=*".$printtime.$row["vehicleid"].$row["glocation"].$row["EntryKey"].$row["rain"].$row["TrafficSensor"].$row["Acc_DataX"].$row["Acc_DataY"].$row["Acc_DataZ"].$row["Lati"].$row["Longi"].$row["misc"];
    }
}
    
   mysqli_close($conn);
}


?>