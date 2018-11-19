<?php
require "connect.php";
$sql="SELECT * FROM `brand` ";
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

<div class="mt-4 py-3">
    <table>
        <thead>
            <tr>
                <th>Brand Name</th>
                <th>Model</th>
                <th>Variant</th>
                <th>Fuel Type</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){

            ?>
            <tr>
                <td>
                    <?php echo $result['brandname']; ?>
                </td>
                <td>
                    <?php echo $result['model']; ?>
                </td>
                <td>
                    <?php echo $result['variant']; ?>
                </td>
                <td>
                    <?php echo $result['fuel']; ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>

<?php
   }
 else {
    echo "0 results";
}
?>
</body>
</div>
</html>