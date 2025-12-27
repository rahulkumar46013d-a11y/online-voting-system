<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location:../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];
if ($_SESSION['userdara']['status'] == 0) {
    $status = '<b style="color:red">not voted</b>';
} else {
    $status = '<b style="color:green">voted</b>';
}
?>
<html>



<head>
    <title>online voting system - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>
    <style>
        #backbtn {

            padding: 10px;
            border-radius: 5px;
            background-color: red;
            float: left;
        }

        #logoutbtn {
            padding: 10px;
            border-radius: 5px;
            background-color: red;
            float: right;

        }
    </style>

    <div id="mainsection">
        <center>
            <div id="headersection">
                <a href="../"> <button id="backbtn"> back</button></a>
                <a href="logout.php"> <button id="logoutbtn">logout</button></a>
                <h1>online voting system</h1>
            </div>
        </center>
        <hr>
        <div id="mainpannel">


            <div id="profile">
                <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"><br><br>
                <b>name:</b> <?php echo $userdata['name'] ?> <br><br>
                <b>mobile:</b> <?php echo $userdata['mobile'] ?><br><br>
                <b>Address:</b> <?php echo $userdata['address'] ?><br><br>

                <b>status:</b> <?php echo $status ?><br><br>

            </div>
            <div id="group"></div>
            <?php
            if ($_SESSION['groupdata']) {
                for ($i = 0; $i < count($groupsdata); $i++) {
            ?>
                    <div>
                        <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                        <b>Group Name:</b> <?php echo $groupsdata[$i]['name'] ?><br><br>
                        <b>votes: </b> <?php echo $groupsdata[$i]['votes'] ?><br><br>
                        <form action="../api/vote.php" method="post">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                            <?php
                            if ($_SESSION['userdata']['status'] == 0) {
                            ?>
                                <input type="submit" name="votebtn" value="vote" id="votebtn">

                            <?php
                            } else {
                            ?>
                                <button disabled type="button" name="votebtn" value="vote" id="voted"> voted</button>

                            <?php

                            }
                            ?>

                        </form>

                    </div>

                    <hr>
            <?php
                }
            }

            ?>

        </div>
    </div>
    </div>





</body>

</html>