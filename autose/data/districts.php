<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');

$sql = "SELECT DISTINCT district FROM `district`";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    echo '<option value="">Choose District</option>';
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['district']."'>".$row['district']."</option>";
    }
} else {
    echo "0 results";
}
