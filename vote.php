<?php
session_start();
include('connect.php');

$votes = $_post['gvotes'];
$total_votes = $votes+1;
$gid = $_post['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect, "UPDATE  user SET votes= '$tota_votes'WHERE id='$gid' ");
$update_user_status =mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){
    $groups = mysqli_query($connect, "SELECT id, name, votes,photo from user WHERE role=2");
    $groupsdata =mysqli_fetch_all($group,MYSQLI_ASSOC);
    $_SESSION['userdata']['status']=1;
    $_SESSION['groupdata'] =$groupsdata;
    echo'
    <script>
        alert("voting successful!");
        window.location ="../routs/dashboard.php";
        </script>
        ';
}



else{
    echo'
    <script>
        alert("some error occured!");
        window.location ="../routs/dashboard.php";
        </script>
        ';
}


?>