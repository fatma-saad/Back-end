<?php
include "DataBase.php";
$connection=conectioncheck();
CheckType($connection);

function chekin($today,$time,$connection,$bin){
    $checkinQuery="INSERT INTO employeecheck (in_time,out_time,bin,date)  VALUES ('$time','NULL','$bin','$today') ";
    $checkin = mysqli_query($connection, $checkinQuery);
    echo "done";
}

function checkout($bin,$connection){
    $time=date("h:i A");
    $checkoutQuery="UPDATE employeecheck SET out_time= '$time' where bin=$bin ";
    $checkoutcon= mysqli_query($connection, $checkoutQuery);
    echo "done";
}

function binvalidation($bin,$connection){
    $binQuary="select * from employee where bin='$bin' ";
    $bincon=mysqli_query($connection,$binQuary);
    if (mysqli_num_rows($bincon) != 0 ){
        return true;
    }
    else{
        js_exit("wrong bin");
    }
}

function checkoutValidation($bin,$connection){
    binvalidation($bin,$connection);
    $today=date("Y-m-d");
    $checkedoutquery="SELECT date from employeecheck where bin ='$bin' and date ='$today'";
    $alreadychecked = mysqli_query($connection, $checkedoutquery);
    if (mysqli_num_rows($alreadychecked) == 0 ){
        js_exit("you didn't checked in  today to checkout ");
    }
    else{
        $row = mysqli_fetch_array($alreadychecked);
        if($row['out_time']== NULL){
            checkout($bin,$connection);
        }
        else{
            js_exit("you checked out before");
        }
    }


}

function checkinValidation($bin,$connection){
    binvalidation($bin,$connection);
    $today=date("Y-m-d");
    $time=date("h:i A");
    $checked="SELECT date from employeecheck where bin ='$bin' and date ='$today'";
    $exists = mysqli_query($connection, $checked);
    if (mysqli_num_rows($exists) != 0 ){
        js_exit("you checked in before today");
    }
    else{
       chekin($today,$time,$connection,$bin);
    }
}


function CheckType($connction)
{
    if ( isset($_GET['form'] )) {
        if ( $_POST['bin']!= NULL && $_GET['form'] == "checkin") {
            checkinValidation($_POST['bin'],$connction);
        }
        if ( $_POST['binn']!= NULL &&$_GET['form'] == "checkout") {
            checkoutValidation($_POST['binn'],$connction);
        }
        if ($_GET['form'] != "checkin" && $_GET['form'] != "checkout") {
            js_exit("wrong check");
        }
    }
    else{
        js_exit("input your bin please or type og check");
    }
}


