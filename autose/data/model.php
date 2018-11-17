<?php
require "connect.php";
$brand=$_POST['brand'];
$sql = "SELECT DISTINCT `model` FROM `brand` WHERE `brandname`= '$brand'";
// echo $sql;
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // echo "<option value=Select>Choose user type </option>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['model']."'>".$row['model']."</option>";
    }
} else {
    echo "0 results";
}