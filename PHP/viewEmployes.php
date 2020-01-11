<?php
include "DataBase.php";

$connection = conectioncheck();
input($connection);

function input($connection)
{
    if (isset($_POST['name']) && $_POST['name'] != NULL) {
        viewBYname($connection, $_POST['name']);
    }
    if (isset($_POST['email']) && $_POST['email'] != NULL) {
        viewBYemail($connection, $_POST['email']);
    }
    if (isset($_POST['bin']) && $_POST['bin'] != NULL) {
        viewBYbin($connection, $_POST['bin']);
    }

    if (isset($_POST['all'])) {
        viewAll($connection);
    } else {
        js_exit("invalid input");
    }
}

function viewAll($connection){
    $viewQuery="SELECT * FROM employee";
    $viewConn = mysqli_query($connection, $viewQuery);
    $Result = mysqli_fetch_array($viewConn);
    echo  json_encode($Result,JSON_PRETTY_PRINT);
}

function viewBYname($connection,$name){
    $viewBYnameQuery=Select('name',$name);
    $viewConn = mysqli_query($connection, $viewBYnameQuery);
    $Result = mysqli_fetch_array($viewConn);
    echo  json_encode($Result);
}

function viewBYemail($connection,$email){
    $viewBYemailQuery=Select('email',$email);
    $viewConn = mysqli_query($connection, $viewBYemailQuery);
    $Result = mysqli_fetch_array($viewConn);
    echo  json_encode($Result);
}

function viewBYbin($connection,$bin){
    $viewBYbinQuery=Select('bin',$bin);
    $viewConn = mysqli_query($connection, $viewBYbinQuery);
    $Result = mysqli_fetch_array($viewConn);
    echo  json_encode($Result);
}

function Select($row,$value){
    $query="SELECT * from employee where {$row} = '$value'";
    return $query;
}

