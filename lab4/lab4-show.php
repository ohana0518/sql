<form action="lab4-main.php" >
<?php
  // 連線到資料庫
  $host = 'localhost';
  $dbuser ='root';
  $dbpassword = '';
  $choose=$_GET['choose'];
  $type=$_GET['type'];
  $datach=$_GET['datach'];
  $tag=implode(',',$datach);
 
  $link = mysqli_connect($host,$dbuser,$dbpassword,$choose);
  if($link){
      mysqli_query($link,'SET NAMES uff8');
       //echo "正確連接資料庫";
  }
  else {
      echo "不正確連接資料庫</br>" . mysqli_connect_error();
  }
  $sumdata="SELECT $type.$tag from $type";
  if ($result = mysqli_query($link, $sumdata)) {

    $rowcount = mysqli_num_rows( $result );
}


  echo"<h1 align='center'>資料庫查詢系統</h1>";
  echo"<p align='center'>資料庫 : $choose,資料表 : $type,總資料筆數 :  $rowcount </p>";

  echo " <table width='100' align='center' height='120' border='1'>";
    mysqli_free_result($result);
	$sql_query = "select $type.$tag from $type";
	$result = mysqli_query($link, $sql_query);
	echo "<tr>";  while ($meta = mysqli_fetch_field($result)) {
        echo "<td style='text-align:left'>$meta->name</td> ";
	
    }
	echo "</tr>";
    while($row=mysqli_fetch_row($result)) {
     
        echo "<tr>";
        for($j=0; $j<mysqli_num_fields($result); $j++) {
                echo "<td style='text-align:left'>$row[$j]</td> ";
        }
       echo "</tr>";
    }
	echo"</table>";
    mysqli_free_result($result);
	mysqli_close($link);
?> 
<div align="center">
<a href="lab4-main.php"  >選擇資料表</a>
  </div>
</form>