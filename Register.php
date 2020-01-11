<?php
include "PHP/DataBase.php";
userTyprCheck();

function adminSign($name,$pass)
{
    $connection=conectioncheck();
    $adminquery= "SELECT * from admin where name='$name' and password='$pass'";
    $adminexists = mysqli_query($connection, $adminquery);
    if (mysqli_num_rows($adminexists) == 1 ){
        header('Location: Admin.html');

    }
    else{
        js_exit("this input is invalid") ;
    }

}

function employeeSign($email,$bin)
{
    $connection=conectioncheck();
    $employeequery= "SELECT *FROM  employee where email='$email' and bin='$bin'";
    $employeeexists = mysqli_query($connection, $employeequery);
    if (mysqli_num_rows($employeeexists) != 0 ){
        header('Location: employee.html');
    }
    else{
        js_exit("this input is invalid") ;
    }

}
function adminSignValidation(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_POST['name'] != NULL  && $_POST['pass'] !=NULL ){
            adminSign($_POST['name'],$_POST['pass']);
        }
        else{ js_exit("missing input"); }
    }
    else{ js_exit("Wrong request type");}

}
function employeeSignValidation(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_POST['email'] != NULL  && $_POST['bin'] !=NULL ){
            employeeSign($_POST['email'],$_POST['bin']);
        }
        else{ js_exit("missing input"); }
    }
    else{ js_exit("Wrong request type");}
}

function userTyprCheck()
{
    if (isset($_GET['form']) && $_GET['form'] == "admin") {
         adminSignValidation();
    }
    if (isset($_GET['form']) && $_GET['form'] == "employee") {
          employeeSignValidation();
    }
    else{
        js_exit("wrong user");
    }

}

