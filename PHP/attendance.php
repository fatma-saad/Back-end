<?php
include "DataBase.php";
$connection=conectioncheck();
validation($_POST['bin'],$_POST['month'],$connection);

function WorkHours($monthsQuery)
{
  $workhours=0;
    while($row = mysqli_fetch_object($monthsQuery)){
        foreach ($row as $key=>$value)
        {
            $features = explode("#", $value);
            $diff=$features[0]-$features[1];
            $workhours=$workhours+$diff;
        }
    }
    $result=$workhours/(60*60);
    echo $result;
}

function MonthAttendance($monthQuery)
{
    $result=mysqli_fetch_array($monthQuery);
    if (mysqli_num_rows($monthQuery) != 0 ){
          echo json_encode($result,JSON_PRETTY_PRINT);
    }
    else{
        js_exit("there is no attendance for this employee") ;
    }
}

function daterange($bin,$month,$connection)
{
    $orderdate = explode('-', $month);
    $yeardate=$orderdate[0];
    $monthdate=$orderdate[1];
    $query="select * from  employeecheck  WHERE MONTH(date) = '$monthdate' AND YEAR(date) = '$yeardate' AND bin='$bin'";
    $viewConn = mysqli_query($connection, $query);
    MonthAttendance($viewConn);
    WorkHours($viewConn);
}

function validation($bin,$month,$connection)
{
     binvalidation($bin,$connection);
     if($month !=NULL){
         daterange($bin,$month,$connection);
     }
     else{
         js_exit("input date");
     }
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