<?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not voted</b>';
    }
    else{
        $status = '<b style="color:green"> voted</b>';

    }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online voting system</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>

    <style>

        #backbtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: blue;
            float: left;
            margin: 12px;
        }
        #logoutbtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: blue;
            float: right;
            margin: 12px;

        }
        #Profile{
            background-color: white;
            width: 30%;
            padding: 20px;
            float: left;
        }
        #Group{
            background-color: white;
            width: 60%;
            padding: 20px;
            float: right;


        }
        #votebtn{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: blue;
            float: left;
        }
        #mainSection{
            padding: 10px
        }
        #voted{
            padding: 5px;
            font-size: 15px;
            border-radius: 5px;
            background-color: green;
            float: left;

        }
    </style>
    <div id="mainSection"><center>
    <div id="headerSection">    
    <button id="backbtn"><a href="../">Back</button></a>
    <button id="logoutbtn"><a href="logout.php">Log out</button></a>
    <h1>ONLINE VOTING SYSTEM</h1>
    </div></center>
   
    <hr>
    <div id="Profile">
        <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="150" width="150" alt="" srcset=""></center><br>
        <b>Name:</b><?php echo $userdata['name']?><br><br>
        <b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
        <b>Address:</b><?php echo $userdata['address']?><br><br>
        <b>Status:</b><?php echo $status?><br><br>

    </div>
    <div id="Group">
        <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count(groupsdata); $i++)
                    ?>
                     <div>
                        <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100" alt="">
                        <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?><br><br>
                        <b>Votes:  </b><?php echo $groupsdata[$i]['votes'] ?><br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                            <?php
                                if($_SESSION['userdata']['status']==0){
                                ?>
                                    <input type="submit" value="Vote" id="votebtn">

                                <?php
                                }
                                else{
                                ?>
                                    <button disabled type="button" value="Vote" id="voted">Voted</button>

                                <?php

                                }

                            ?>
                            
                        </form>
                     
                     </div>
                     <hr>

        <?php


            }
            else{

            }

        ?>

    </div>
    </div>

    
</body>
</html>