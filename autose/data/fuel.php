<?php
require "connect.php";
$variant=$_POST['variant'];
//$model=$_POST['model'];
$sql = "SELECT `fuel` FROM `brand` WHERE `variant`= '$variant'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['fuel']."'>".$row['fuel']."</option>";
    }
} else {
    echo "0 results";
}