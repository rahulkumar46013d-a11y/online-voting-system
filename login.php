<?php
session_start();

include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect,"SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role' ");

if(mysqli_num_fields($check)>0){
    $userdata = mysqli_fetch_array($check);
    $group = mysqli_query($connect,"SELECT * FROM user WHERE role =2");
    $groupsdata =mysqli_fetch_all($group,MYSQLI_ASSOC);

    $_SESSION['userdata']=$userdata;
    $_SESSION['groupdata'] =$groupsdata;
    echo'
    <script>
           
           window.location ="../routs/dashboard.php";
    </script>
    '; 

}
else{
    echo'
    <script>
           alert("invalid credentials or user not found!");
           window.location ="../";
    </script>
    ';
}

?>