<?php
// 創建連接
$link = mysqli_connect("localhost", "root", "", "lab6db");

// 檢測連接
if ($link === false) {
    ("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_query($link, "DROP TABLE IF EXISTS product");
mysqli_query($link, "CREATE TABLE IF NOT EXISTS product(pNo char(6) NOT NULL, pName varchar(30) DEFAULT NULL,unitPrice decimal(10,2) DEFAULT NULL,catalog varchar(20) DEFAULT NULL
)");

// 預處理及綁定
$stmt = mysqli_prepare($link, "insert into product (pNo, pName,unitPrice,catalog) values(?, ?,?,?)");
mysqli_stmt_bind_param($stmt, "ssis", $pNo, $pName,$unitPrice,$catalog);

// 設置參數並執行
$pNo="b10234";
$pName="管理資訊系統概論";
$unitPrice=600;
$catalog="Book";

mysqli_stmt_execute($stmt);

$pNo="b20666";
$pName="OLAP進階";
$unitPrice=500;
$catalog="Book";
mysqli_stmt_execute($stmt);

$pNo="b30999";
$pName="資料庫理論與實務";
$unitPrice=500;
$catalog="Book";
mysqli_stmt_execute($stmt);

$pNo="d03333";
$pName="5566專輯";
$unitPrice=450;
$catalog="CD";
mysqli_stmt_execute($stmt);

$pNo="v10888";
$pName="哈利波特-混血王子的背叛";
$unitPrice=450;
$catalog="DVD";
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//Reading records
$stmt = mysqli_prepare($link, "SELECT * FROM product");

//Executing the statement
mysqli_stmt_execute($stmt);

//Storing the result
mysqli_stmt_store_result($stmt);

//Number of rows
$count = mysqli_stmt_num_rows($stmt);
print("Number of rows in the table: ".$count."<br>");
mysqli_stmt_bind_result($stmt, $pNo, $pName,$unitPrice,$catalog);

echo " <table border='2'>";

$sql_query = "select DISTINCT * from lab6db.product;";
$result = mysqli_query($link, $sql_query);
echo "<tr>"; 
 while ($meta = mysqli_fetch_field($result)) {
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


//Closing the statement
mysqli_stmt_close($stmt);
mysqli_close($link)
?>