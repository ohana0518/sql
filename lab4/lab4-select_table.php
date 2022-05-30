<?php
  // 連線到資料庫
  $host = 'localhost';
  $dbuser ='root';
  $dbpassword = '';
  $choose=$_GET['choose'];
  $link = mysqli_connect($host,$dbuser,$dbpassword,$choose);
  if($link){
      mysqli_query($link,'SET NAMES uff8');
       //echo "正確連接資料庫";
  }
  else {
      echo "不正確連接資料庫</br>" . mysqli_connect_error();
  }
  
?>
<form action="lab4-select_fields.php" method="get">
<h1>資料庫查詢系統</h1>
資料庫名稱:<input type="text" name="choose" value="<?php echo "$choose";?>" />
<br></br>


 <fieldset>
    <legend>Tables Selector</legend>

    <?php
    
    	$result = mysqli_query($link,'$choose');
      #$row=mysqli_fetch_row($result);
    $sql_query = "select table_name from information_schema.tables where table_schema = '$choose'";
    $result = mysqli_query($link, $sql_query);
      while($row=mysqli_fetch_row($result)) {
          for($j=0; $j<mysqli_num_fields($result); $j++) {           
                  echo "<input type='radio' name='type' value='$row[$j]'>$row[$j]</br>";
          }
 
      }
    ?>
    <input type ="submit" value="送出">
    </form>
  </fieldset>
