<?
date_default_timezone_set( 'Asia/calcutta' );
echo $inserttime=date('dmyhis');
echo "<br>";
echo  $datestring= substr($inserttime, 0, -6);
echo "<br>";
echo  $timestring= substr($inserttime, -6);
echo "<br>";

?>