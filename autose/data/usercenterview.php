<?php
require "connect.php";

$sql = "SELECT * FROM `servicecenter`";
$val=mysqli_query($conn,$sql);
if ($val) {
    ?>
<html>  

<head>

    <style>
        td, th {
                border: 1px solid black; 
                padding: 25px;   
            }
            th {
                background-color: gray;
                color: white;
            }
            td img{
                width:100px;
                height:auto;
            }
        </style>

</head>

<body>
<div>
<form>
Find service center near you
<select name="district" id="district">
    <?php
        include('districts.php');
    ?>
</select >
<select name="brand" id="brand">
    <?php
        include('brand.php');
    ?>
</select >
<input type="button" class="user-click" data-type="search" data-id="district brand" value="Search">
</form>
</div>
    <table>
        <thead>
            <tr>
                <th>Center Name</th>
                <th>Brand</th>
                <th>Type</th>
                <th>District</th>
                <th>Place</th>
                <th>Contact Number</th>
                <th>Licence Number</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){

            ?>
            <tr>
                <td>
                    <?php echo $result['centername']; ?>
                </td>
                <td>
                    <?php echo $result['brand']; ?>
                </td>
                <td>
                    <?php echo $result['type']; ?>
                </td>
                <td>
                    <?php echo $result['district']; ?>
                </td>
                <td>
                    <?php echo $result['place']; ?>
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                <td>
                    <?php echo $result['licenceno']; ?>
                </td>
                <td id="servControl<?php echo $result['scid']; ?>"> 
                    <input type="button" class="user-click" data-type="appointment" data-id= <?php echo $result['scid']; ?> value="Make an appointment">
                    
                </td>

            </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php
   }
 else {
    echo "0 results";
}