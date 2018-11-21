<?php
require "connect.php";
require "session.php";
//session_start();


$type = $_POST['type'];
// print_r($_POST);

// __halt_compiler();
switch($type){   
        case 'login':
            // echo $type;
            userLogin($conn);
            break;

            case 'reguser':
            regUser($conn);
            break;
        case 'userreg':
            userProfile($conn);
            break;
        case 'centerreg':
            centerRegistration($conn);
         break;
         case 'forget':
            forgetPassword($conn);
        break;
        default:
            break;
    }   

function regUser($conn){
    $email=$_POST['email'];
    $desg=$_POST['designation'];
    $pswd=base64_encode($_POST['pswd']);
    $cpswd=base64_encode($_POST['cpswd']);
    

        
    $sql = "SELECT * FROM `login` WHERE username='$email'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
    //print_r($count);
    //__halt_compiler();

    echo"<script> alert('Already exist');window.location ='../reguser.php';</script>";
    }
   
    else
    {
        $sql1="INSERT INTO login (username,password,usertype,status) VALUES ('$email','$pswd','$desg','2')";
        $res1 = mysqli_query($conn, $sql1);
       echo"<script> alert('Registration Successful');window.location ='../index.php';</script>";
    } 

}

//user fns
function userLogin($conn){
    $uname = $_POST['username'];
    $password = base64_encode($_POST['password']);

    $sql = "SELECT * FROM `login` WHERE username='$uname' and password = '$password' and status >=1";

    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res)>0){
        $result = mysqli_fetch_assoc($res);

        // print_r($result);
        $a=$result['usertype'];
    // print_r($a);
        if($a == 'admin')
        { 
            $id = $result['logid'];
            $utype = $result['usertype'];
            setSession('logid', $id);
            setSession('utype', $utype);
            //print_r($id);
            echo "<script>alert('Login Successfull');window.location='../adminhome.php';</script>";

        }
        else if($a=="user")
        { 
            $id = $result['logid'];
            $utype = $result['usertype'];
            $status=$result['status'];
            setSession('logid', $id);
            setSession('utype', $utype);
            if($status=="2"){
                header('Location:../registration.php');
            }
            else{

            echo "<script>alert('Login Successfull');window.location='../user.php';</script>";

            }
        }

        else if($a=="servicecenter")
        { 
            $id = $result['logid'];
            $utype = $result['usertype'];
            $status=$result['status'];
            $sql = "SELECT `brand` FROM `servicecenter` WHERE `logid`='$id'";
            $res1 = mysqli_query($conn, $sql);
            setSession('logid', $id);
           // setSession('logid', $id);
            setSession('utype', $utype);
            setSession('brand',$res1);
            if($status=="2"){
                header('Location:../servicecenteradd.php');
            }
            else if($status=="1"){

            echo "<script>alert('Login Successfull');window.location='../sevricecenterhome.php';</script>";

            }
            else
        {
            // echo $sql;
            echo "<script>alert('You are not an authorised user');window.location='../index.php';</script>";
                //header("location:../index.php"); 
        }
        }

        
    }
    else{
        echo "<script>alert('Invalid Username or Password');window.location='../index.php';</script>";
    }
}


function userProfile($conn){
    $fname=$_POST['fname'];
   // $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $mob=$_POST['mobno'];
    $dist=$_POST['district'];
    $place=$_POST['place'];
    //$logid=getSession('logid');
    $val=getSession('logid');
   
    //print_r($img);
 

    $z="select * from login where logid='$val'";
    $r1=mysqli_query($conn,$z);
    $row=mysqli_fetch_array($r1);
    $email=$row[1];
    //print_r($email);

    $sql="SELECT * FROM `user` WHERE `mobile`='$mob' ";
    $count=mysqli_query($conn,$sql);
    if(mysqli_num_rows($count)<1){
        $sDirPath = 'upload/'.$val.'/'; //Specified Pathname
        mkdir($sDirPath,0777,true);
        $path=$_FILES['photo']['name'];
        $path = '/upload/'.$val.'/'.$path;
        $img=$_FILES['photo']['name'];
    $sql= "INSERT INTO `user` (`logid`,`fname`,`lname`,`email`,`mobile`,`district`,`place`,`photo`) VALUES ('$val','$fname','$lname','$email','$mob','$dist','$place','$path')";
    $r2=mysqli_query($conn,$sql);
    move_uploaded_file($_FILES['photo']['tmp_name'],'upload/'.$val.'/'. $_FILES['photo']['name']);
    $sql2="UPDATE `login` SET `status`=1 where `logid`=$val";
    mysqli_query($conn,$sql2);
    echo "<script>alert('Profile updated successfully');window.location='../user.php';</script>";
    }
    else{
        echo "<script>alert('Check the data you provided');window.location='../registration.php';</script>";
    }
    /* if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
        
}



function centerRegistration($conn){
    $cname=$_POST['cname'];
    $licno="lic".$_POST['licno'];
    $type=$_POST['types'];
    $brand=$_POST['brand'];
    $mob=$_POST['mobno'];
    $dist=$_POST['district'];
    $place=$_POST['place'];
    $val=getSession('logid');
    $z="select * from login where logid='$val'";
    $r1=mysqli_query($conn,$z);
    $row=mysqli_fetch_array($r1);
    $email=$row[1];
    //print_r($email);
        $sql="SELECT * FROM `servicecenter` WHERE  `licenceno`='$licno' OR `mobile`='$mob' ";
        $count=mysqli_query($conn,$sql);
        if(mysqli_num_rows($count)<1){
            $sDirPath = 'upload/'.$val.'/'; //Specified Pathname
            mkdir($sDirPath,0777,true);
            $cert=$_FILES['certificate']['name'];
            $cert = '/upload/'.$val.'/'.$cert;
            $img=$_FILES['certificate']['name'];

            $sql= "INSERT INTO `servicecenter`(`logid`, `centername`, `licenceno`, `type`, `brand`, `district`, `place`, `certificate`, `mobile`) VALUES ('$val','$cname','$licno','$type','$brand','$dist','$place','$cert','$mob')";
        // print_r($sql);
            $r2=mysqli_query($conn,$sql);
             move_uploaded_file($_FILES['certificate']['tmp_name'],'upload/'.$val.'/' . $_FILES['certificate']['name']);
     
            $sql2="UPDATE `login` SET `status`=0 where `logid`=$val";
             mysqli_query($conn,$sql2);
            echo "<script>alert('Updated successfully...!! Wait for Approvel');window.location='../index.php';</script>";
    }
    else{
        echo "<script>alert('Check Your Data!');window.location='../index.php';</script>";
    }

    /* if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
         
}

function forgetPassword($conn){
    $email=$_POST['email'];
    $sql="SELECT * FROM `login` WHERE `username`='$email'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
    $a=$row['username'];
    if($a==$email)
	{
	$e=$row['username'];
   // $p="Password:".$row['password'];
    $pass=$row['password'];
    $pa=base64_decode($pass);
    $p="Password:".$pa;
    $m="Username:".$e."\r\n".$p;
	mail($e,"Recover",$m);
    echo "<script>alert('Authentication Success Please check your mail');window.location='../index.php';</script>";
	}
	else{
        echo "<script>alert('Please provide valid informations');window.location='../index.php';</script>";
    }
    
	
}