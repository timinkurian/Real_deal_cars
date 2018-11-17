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
        default:
            break;
    }   
//adding new brand
function newBrand($conn){
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $variant=$_POST['variant'];
    $fuel=$_POST['fuel'];
    $sql="INSERT INTO `brand`(`brandname`, `model`, `variant`, `fuel`) VALUES('$brand','$model','$variant','$fuel')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully');window.location=../adminbrand.php;</script>";
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