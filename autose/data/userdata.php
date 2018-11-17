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
        case 'userreg':
            userProfile($conn);
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
