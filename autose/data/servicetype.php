<?php
require "connect.php";
//require "session.php";
//$brand=getSession('brand');
$val=getSession('logid');
$sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
$sci=mysqli_query($conn,$sq);
$data1 = mysqli_fetch_assoc($sci);
$sc = $data1['scid'];
$sql = "SELECT `stype` FROM `stypes` WHERE `scid`='$sc'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '<option value=Select>Choose Service Type</option>';
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['stype']."'>".$row['stype']."</option>";
    }
} else {
    echo "0 results";
}