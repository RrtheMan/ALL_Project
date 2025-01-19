<?php
$con = mysqli_connect('localhost','id21619202_rabor017','Wizard077!','Account');


function escape($string)
{
    global $con;
    return mysqli_real_escape_string($con,$string);
}

function Query($query)
{
    global $con;
    return mysqli_query($con,$query);
}

function confirm($result)
{
    global $con;
    if (!$result)
    {
       die('Query Failed'.mysqli_error($con));
    }
}

function fatech_data($result)
{
    
    return mysqli_fetch_assoc($result);
}
?>