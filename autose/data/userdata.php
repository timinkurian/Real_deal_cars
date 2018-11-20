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
        case 'profileupdate':
            profileUpdate($conn);
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
        $val=getSession('logid');
        $sDirPath = 'upload/car/'.$vehno.'/'; //Specified Pathname
        mkdir($sDirPath,0777,true);
        $path=$_FILES['rcbook']['name'];
        $path = '/upload/car/'.$vehno.'/'.$path;
        $img=$_FILES['rcbook']['name'];
        $path1=$_FILES['car']['name'];
        $path1 = '/upload/car/'.$vehno.'/'.$path1;
        $img1=$_FILES['car']['name'];

        $sql="SELECT `usrid` FROM `user` WHERE `logid`='$val'";
        $usid=mysqli_query($conn,$sql);
        $data1 = mysqli_fetch_assoc($usid);
        $usrid = $data1['usrid'];

        $sql4="SELECT `*` FROM `car` WHERE `usrid`='$usrid' AND `engineno`='$engineno' AND `chasisno`='$chasisno'";
        $count=mysqli_query($conn,$sql4);
        if(mysqli_num_rows($count)<1){
        $sql1="INSERT INTO `car` (`vehno`, `usrid`, `brand`, `model`,`variant`, `fuel`, `man_year`, `color`, `engineno`, `chasisno`, `rcbook`, `image`, `status`) VALUES ('$vehno','$usrid','$brand','$model','$variant','$fuel','$year','$color','$engineno','$chasisno','$path','$path1','aproval Pending')";
        mysqli_query($conn,$sql1);
        move_uploaded_file($_FILES['rcbook']['tmp_name'],'upload/car/'.$vehno.'/' . $_FILES['rcbook']['name']);
        move_uploaded_file($_FILES['car']['tmp_name'],'upload/car/'.$vehno.'/' . $_FILES['car']['name']);
        echo "<script>alert('Car Added successfully');window.location='../user.php';</script>";
        }
        else{
            echo "<script>alert('Already Exist');window.location='../user.php';</script>";
        }
    }
function searchCenter($conn){
    $district=$_POST['dist'];
    $brand=$_POST['brand'];
    $sql="SELECT * FROM `servicecenter` WHERE `district`='$district' AND `brand`='$brand'";
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
function makeAppointment($conn){
    $date=$_POST['date'];
    $vehno=$_POST['vehno'];
    $stype=$_POST['stype'];
    $remarks=$_POST['remarks'];
    $logid=getSession('logid');
    $scid=getSession('scid');
    //fetching userid
    $sql1="SELECT `usrid` FROM `user` WHERE `logid`='$logid'";
    $usid=mysqli_query($conn,$sql1);
    $data1 = mysqli_fetch_assoc($usid);
    $usrid = $data1['usrid'];
    //fetching service type id
    $sql2="SELECT `typeid` FROM `servicescheme` WHERE `stype`='$stype' AND `scid`='$scid'";
    $tid=mysqli_query($conn,$sql2);
    $data2 = mysqli_fetch_assoc($tid);
    $typeid = $data2['typeid'];
    //find maximum capacity of srvice center
    $sql3="SELECT `maximum` FROM `stypes` WHERE `typeid`='$typeid' AND `scid`='$scid'";
    $max=mysqli_query($conn,$sql3);
    $data3 = mysqli_fetch_assoc($max);
    $maxcount = $data3['maximum'];
    //finding the booking for service type on a particular day
    $sql4="SELECT `*` FROM `scount` WHERE `typeid`='$typeid' AND `date`='$date' AND `scid`='$scid'";
    $count=mysqli_query($conn,$sql4);
    if(mysqli_num_rows($count)<1){
            //table is empty directly into both tables
            $sql5="INSERT INTO `scount`( `date`,`scid`, `typeid`, `count`) VALUES ('$date','$scid','$typeid',1)";
            mysqli_query($conn,$sql5);
            $sql6="INSERT INTO `appointment`(`date`,`vehno`, `usrid`,`scid`, `stype`,`sname`, `remarks`,`status`) VALUES ('$date','$vehno','$usrid','$scid','$typeid','$stype','$remarks','booked')";
            mysqli_query($conn,$sql6);
            $_SESSION['scid'] = '';
            echo "<script>alert('Added successfully');window.location='../user.php';</script>";


    }
    else{
        $data3 = mysqli_fetch_assoc($count);
        $acount = $data3['count'];
        if($acount<$maxcount){
            //checking already applied or not
            $sql9="SELECT `*` FROM `appointment` WHERE `vehno`='$vehno' AND `date`='$date' AND `scid`='$scid'";
            $count1=mysqli_query($conn,$sql9);
            if(mysqli_num_rows($count1)<1){
                $acount=$acount+1;
                //not already applied and anyone is already applied for that particular service only upate is performed
                $sql7="UPDATE `scount` SET `count`='$acount'";
                mysqli_query($conn,$sql7);
                //inserting to appointment table
                $sql8="INSERT INTO `appointment`(`date`,`vehno`, `usrid`,`scid`, `stype`,`sname`, `remarks`,`status`) VALUES ('$date','$vehno','$usrid','$scid','$typeid','$stype','$remarks','booked')";
                mysqli_query($conn,$sql8);
                $_SESSION['scid'] = '';
                echo "<script>alert('Added successfully');window.location='../user.php';</script>";
            }
            else{
                echo "<script>alert('Sorry!! You are already made an appointment');window.location='../user.php';</script>";
            }   
        }
        else{
            echo "<script>alert('Please choose another day because of overloads');window.location='../user.php';</script>";
        }
    }
}
function profileUpdate($conn){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mob=$_POST['mobile'];
    $dist=$_POST['district'];
    $place=$_POST['place'];
    $logid=getSession('logid');
    $sql="UPDATE `user` SET `fname`='$fname',`lname`='$lname',`mobile`='$mob',`district`='$dist',`place`='$place' WHERE `logid`='$logid'";
    mysqli_query($conn,$sql);
    echo "<script>alert('Profile updated successfully');window.location='../user.php';</script>";
}