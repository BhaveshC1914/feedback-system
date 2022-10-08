<?php
session_start();
include("database.php");
extract($_POST);

$nm = $_SESSION['uname'];
    if(isset($submit)){
        if($nm==''){
            echo "<script type='text/javascript'>
            alert('Session Expired, Please Go To Home Page');
            history.back();
            </script>";
        }else{
            $sql = "INSERT INTO expert (user_uname, query) VALUES ('$nm','$qry')";
            $cn->query($sql);
            echo "<script type='text/javascript'>
            alert('Query Successfully Added');
            history.back();
            </script>";
        }
    }
?>