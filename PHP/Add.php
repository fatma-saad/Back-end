<?php
include "DataBase.php";
Validation();

function Add($name,$email,$bin,$connection){
    $date=date("Y-m-d");
    $addQuery= "INSERT INTO employee (name,email,bin,date)VALUES ('$name','$email','$bin','$date')";
    $adding = mysqli_query($connection, $addQuery);
    echo "Success Adding";
}

function valueExistes ($name,$email,$bin,$connection){
    $emailQuary = "SELECT email from employee where email='$email'";
    $binQuary =  "SELECT bin from employee where bin='$bin'";
    $mailexists = mysqli_query($connection, $emailQuary);
    $binexists = mysqli_query($connection, $binQuary);
    if (mysqli_num_rows($mailexists) !=0 ||mysqli_num_rows($binexists) != 0){ js_exit("this input have value exists before");  }
    else {
        Add($name,$email,$bin,$connection);
    }
}

function Validation(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_POST['name'] != NULL  && $_POST['email'] !=NULL &&$_POST['bin'] !=NULL ){
            $connection=conectioncheck();
            valueExistes($_POST['name'],$_POST['email'],$_POST['bin'],$connection);
        }
        else{ js_exit("missing input"); }
    }
    else{ js_exit("Wrong request type");}
}

