<?
require_once('dbclass/database.php');
$dbclass=new database();

$query_for_paging2="select * FROM apsisrecord  order by id desc";
$result_select2 =mysql_query($query_for_paging2);
$row2 = mysql_fetch_assoc($result_select2);
?>

<table width="500" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="68">S.no</td>
    <td width="418">Value</td>
   
  </tr>
  <?
  $i=1;
  while($row2 = mysql_fetch_assoc($result_select2)){
  ?>
  <tr>
    <td><?=$i;?></td>
    <td><?=$row2['string']?></td>
   
  </tr>
  <? $i++; } ?>
</table>
