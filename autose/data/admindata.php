<?php
require "connect.php";
require "session.php";
//session_start();
$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'brand':
            // echo $type;
            newBrand($conn);
        break;
        case 'approve':
            approvecenter($conn);
        break;
        case 'reject':
            rejectCenter($conn);
        break;
        case 'viewuser':
            viewUser($conn);
        break;
        case 'district':
            districtAdd($conn);
        break;
        case 'viewdistrict':
            viewDistrict($conn);
        break;
        default:
        break;
    }   
//adding new brand
function newBrand($conn){
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $variant=$_POST['variant'];
    $fuel=$_POST['fuel'];
    $sql4="SELECT `*` FROM `brand` WHERE `brandname`='$brand' AND `model`='$model' AND `variant`='$variant' AND `fuel`='$fuel'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
    $sql="INSERT INTO `brand`(`brandname`, `model`, `variant`, `fuel`) VALUES('$brand','$model','$variant','$fuel')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully!');window.location='../adminhome.php';</script>";
    }
    else{
        echo "<script>alert('Already Exists!');window.location='../adminbrand.php';</script>";
    }
}
function approvecenter($conn){
    $sid=$_POST['id'];
     $sql="UPDATE `login` SET `status`= 1 WHERE `logid`=(SELECT `logid` FROM `servicecenter` WHERE `scid`='$sid')";
    mysqli_query($conn, $sql);
    // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
    echo '1';
}
function rejectCenter($conn){
//    alert();
    $sid=$_POST['id'];
     $sql="UPDATE `login` SET `status`= '-1' WHERE `logid`=(SELECT `logid` FROM `servicecenter` WHERE `scid`='$sid')";
    mysqli_query($conn, $sql);
    // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
    echo '2';
}

function districtAdd($conn){//adding district
    $dname=$_POST['dname'];
   
    $sql="INSERT INTO district (district) VALUES ('$dname')";
    mysqli_query($conn,$sql);
    echo "<script>alert('registered successfully');window.location='../districtadd.php';</script>";   
   
}
function viewDistrict($conn){
    ?>
    <html>  
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
    <body>
    <div class="mt-20 py-3">
    <table>
        <thead>
            <tr>
                <th>District</th>            
            </tr>
        </thead>
        <?php
    $sql="SELECT * FROM `district`";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($res)){
            ?>
            <tr>
                <td>
                    <?php echo $result['district']; ?>
                </td>

            </tr>
                <?php
            }
            ?>
        </tbody>

<?php
   }
 else {
    echo "0 results";
}?>
</table>
</div>
</body>

</html>
<?php
    }
function viewUser($conn){
    ?>
    <html>  
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
    <body>
    <table>
        <thead>
            <tr>
                <th>User Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>District</th>
                <th>Place</th>
                <th>Profile Photo</th>              
            </tr>
        </thead>
        <?php
    $sql="SELECT * FROM `user`";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($res)){
            ?>
            <tr>
                <td>
                    <?php echo $result['usrid']; ?>
                </td>
                <td>
                    <?php echo $result['fname']; ?>
                </td>
                <td>
                    <?php echo $result['lname']; ?>
                </td>
                <td>
                    <?php echo $result['email']; ?>
                </td>
                <td>
                    <?php echo $result['mobile']; ?>
                </td>
                <td>
                    <?php echo $result['district']; ?>
                </td>
                <td>
                    <?php echo $result['place']; ?>
                </td>
                <td>
                   
                   <a href="data/<?php echo $result['photo']; ?>" target="_blank">
                   <img src="data/<?php echo $result['photo']; ?>">
           </a>
               </td>

            </tr>
                <?php
            }
            ?>
        </tbody>

<?php
   }
 else {
    echo "0 results";
}?>
</table>
</body>

</html>
<?php
    }
    ?>