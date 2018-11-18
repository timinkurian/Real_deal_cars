<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'addcar':
            // echo $type;
            addCar($conn);
            break;

            case 'appointment':
            makeAppointment($conn);
            break;
        case 'search':
            searchCenter($conn);
            break;
        case 'district':
            districtAdd($conn);
            break;
        case 'centerreg':
            centerRegistration($conn);
         break;
        default:
            break;
    }   
    function addCar($conn){
        $vehno=$_POST['vehno'];
        $brand=$_POST['brand'];
        $model=$_POST['model'];
        $variant=$_POST['variant'];
        $fuel=$_POST['fuel'];
        $color=$_POST['color'];
        $year=$_POST['year'];
        $engineno=$_POST['engineno'];
        $chasisno=$_POST['chasisno'];

        $path=$_FILES['rcbook']['name'];
        $path = '/upload/car/'.$path;
        $img=$_FILES['rcbook']['name'];
        $path1=$_FILES['car']['name'];
        $path1 = '/upload/car/'.$path1;
        $img1=$_FILES['car']['name'];
        $val=getSession('logid');
        $sql="SELECT `usrid` FROM `user` WHERE `logid`='$val'";
        $usid=mysqli_query($conn,$sql);
        $data1 = mysqli_fetch_assoc($usid);
        $usrid = $data1['usrid'];
        $sql1="INSERT INTO `car` (`vehno`, `usrid`, `brand`, `model`,`variant`, `fuel`, `man_year`, `color`, `engineno`, `chasisno`, `rcbook`, `image`, `status`) VALUES ('$vehno','$usrid','$brand','$model','$variant','$fuel','$year','$color','$engineno','$chasisno','$path','$path1','0') ";
        mysqli_query($conn,$sql1);
        move_uploaded_file($_FILES['rcbook']['tmp_name'],'upload/car/' . $_FILES['rcbook']['name']);
        move_uploaded_file($_FILES['car']['tmp_name'],'upload/car/' . $_FILES['car']['name']);
        echo "<script>alert('Car Added successfully');window.location='../user.php';</script>";
    }
function searchCenter($conn){
    $district=$_POST['dist'];
    $brand=$_POST['brand'];
    $sql="SELECT * FROM `servicecenter` WHERE `district`='$district' OR `brand`='$brand'";
    //die();
    $val=mysqli_query($conn,$sql);
    if ($val) {
    ?>
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
                <td id="userControl<?php echo $result['scid']; ?>"> 
                <form name="" id="login" method="post" action="appointment.php" class="mt-5">
                    <input type="text" hidden value="<?php echo $result['scid']; ?>" name="type">
                    <input type="submit" class=" btn btn-primary btn-sm"  value="Make an appointment">
                </form> 
                </td>

            </tr>
                <?php
            }
            ?>
<?php
   }
 else {
    echo "0 results";
}?>

<?php
}