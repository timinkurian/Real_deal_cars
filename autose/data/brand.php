<?php
require "connect.php";

$sql = "SELECT DISTINCT brandname FROM `brand`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '<option value=Select>Choose the brand</option>';
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['brandname']."'>".$row['brandname']."</option>";
    }
} else {
    echo "0 results";
}