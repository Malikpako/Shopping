
<?php
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"hassan");
?>
<h2>Display Items</h2>
<div class="block">
    <?php
    $res=mysqli_query($link,"select * from product");
    echo "<table border='1'>";
    echo"<tr>";
    echo"<th>"; echo "product image"; echo "</th>";
    echo"<th>"; echo "product name"; echo "</th>";
    echo"<th>"; echo "product price"; echo "</th>";
    echo"<th>"; echo "product qty"; echo "</th>";
    echo"<th>"; echo "product category"; echo "</th>";
    echo"<th>"; echo "delete"; echo "</th>";
    echo"</tr>"; 
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>";?> <img src="<?php echo $row["product_image"]; ?>" heightt="100" width="100"> <?php echo "</td>";
        echo "<td>"; echo $row ["product_name"]; echo "</td>";
        echo "<td>"; echo $row ["product_price"]; echo "</td>";
        echo "<td>"; echo $row ["product_qty"]; echo "</td>";
        echo "<td>"; echo $row ["product_category"]; echo "</td>";
        echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"];?>">delete</a> <?php echo "</td>";
        
        echo "</tr>";
    }
   echo "</table>";    


   ?>