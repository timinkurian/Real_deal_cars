<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'schemeadd':
            // echo $type;
            schemeAdd($conn);
            break;

            case 'viewschemes':
            viewSchemes($conn);
            break;
            case 'addtype':
            addServiceType($conn);
            break;
            case 'started':
            serviceStarted($conn);
            break;
        default:
            break;
    }   
    function schemeAdd($conn){
    $sname=$_POST['sname'];
    $stype=$_POST['stype'];
    $brand=$_POST['brand'];
    $model=$_POST['model'];
    $variant=$_POST['variant'];
    $fuel=$_POST['fuel'];
    $replacing=$_POST['replacing'];
    $checking=$_POST['checking'];
    $amount=$_POST['amount'];
    $val=getSession('logid');
    // $sql="SELECT `brandid` FROM `brand` WHERE `brandname`='$brand' AND `model`='$model' AND `variant`='$variant' AND `fuel`='$fuel'";
    //    die();
    //$res = mysqli_query($conn,$sql);
    //$data = mysqli_fetch_assoc($res);
    //$br = $data['brandid']; 
   $sql2="SELECT `typeid` FROM `stypes` WHERE `sname`='$sname'"; 
   $si=mysqli_query($conn,$sql2);
    $data=mysqli_fetch_assoc($si);
    $typeid=$data['typeid'];
    $sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
    $sci=mysqli_query($conn,$sq);
    $data1 = mysqli_fetch_assoc($sci);
    $sc = $data1['scid'];
   // echo $sq;
   // die();
   $sql1="INSERT INTO `servicescheme`(`stype`,`scid`,`typeid`,`brand`,`model`,`variant`,`fuel`,`replaced`,`checked`,`amount`) VALUES ('$stype','$sc','$typeid','$brand','$model','$variant','$fuel','$replacing','$checking','$amount')";
       //die();
    mysqli_query($conn,$sql1);
    echo "<script>alert('Added Successfully');window.location='../Addservicescheme.php';</script>";
    }


    function viewSchemes($conn){
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
                td{
                    background-color:white;
                    color:black;
                }
                td img{
                    width:100px;
                    height:auto;
                }
            </style>    
        <body>
        <div class="py-3">
        <table>
            <thead>
                <tr>
                    <th>Service Id</th>
                    <th>Service Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Variant</th>
                    <th>Fuel</th>
                    <th>Replacing Parts</th>
                    <th>Inspecting Parts</th>
                    <th> Approximate Amount</th>               
                </tr>
            </thead>
            
            <?php
                $val=getSession('logid');
                $sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
                $sci=mysqli_query($conn,$sq);
                $data1 = mysqli_fetch_assoc($sci);
                $sc = $data1['scid'];
        $sql = "SELECT * FROM `servicescheme` WHERE `scid`='$sc'";
    $val=mysqli_query($conn,$sql);
    if ($val) {
        ?>

        <tbody>
            <?php
            while($result=mysqli_fetch_array($val)){
            ?>
            <tr>
                <td>
                    <?php echo $result['sid']; ?>
                </td>
                <td>
                    <?php echo $result['stype']; ?>
                </td>
                <td>
                    <?php echo $result['brand']; ?>
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
                <td>
                    <?php echo $result['replaced']; ?>
                </td>
                <td>
                    <?php echo $result['checked']; ?>
                </td>
                <td>
                    <?php echo $result['amount']; ?>
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
function addServiceType($conn){
    $sname=$_POST['sname'];
    $maximum=$_POST['maximum'];
    $val=getSession('logid');
    $sq="SELECT `scid` FROM `servicecenter` WHERE `logid`='$val'";
    $sci=mysqli_query($conn,$sq); 
    $data1 = mysqli_fetch_assoc($sci);
    $scid = $data1['scid'];
    $sql1 = "SELECT * FROM `stypes` WHERE `scid`='$scid' AND `sname`='$sname'";
    $res = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($res)>0){
        echo"<script> alert('Already exist');window.location ='../addservicetypes.php';</script>";
    }
    else{
    $sql="INSERT INTO `stypes` (`scid`, `sname`,`maximum`) VALUES ('$scid','$sname','$maximum')";
    mysqli_query($conn,$sql);
    echo "<script>alert('Added Successfully');window.location='../addservicetypes.php';</script>";
    }

}
function serviceStarted($conn){
    $apid=$_POST['id'];
    $sql="UPDATE `appointment` SET `status`= 'Started' WHERE `apid`='$apid'";
   mysqli_query($conn, $sql);
   // echo "<script>alert('Approved');window.location=../adminhome.php;</script>";
   echo '1';
}