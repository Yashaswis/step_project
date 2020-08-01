<?
require_once('dbclass/database.php');
$dbclass=new database();
@extract($_REQUEST);
/*$url="http://logicel.org/apsisurl/insertrecord.php?genno=ARFMS02000&date_of_gen=14/04/2014&timeon_of_gen=12:34:00&timeoff_of_gen=13:23:00&duratn=01:00&avgtemp=54&avgvltr=ok&avgvlty=ok&avgvltb=ok&fdr=addedfromURL";*/
 $finalstring=$genno.$date_of_gen.$timeon_of_gen.$duratn.$avgtemp.$avgvltr.$avgvlty.$avgvltb.$fdr;

mysql_query("insert into apsisrecord(comstring,entdate) VALUES ('$finalstring',now())") ;

echo "Record Insert Successfully!!";

?>