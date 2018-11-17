<?php
require "connect.php";

$sql = "SELECT * FROM `district`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo '<option value=Select>Choose your district</option>';
    while($row = $result->fetch_assoc()) {
        echo "<option value='".$row['district']."'>".$row['district']."</option>";
    }
} else {
    echo "0 results";
}