<?php
    session_start(); 
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status='<b style="color:red">Not Voted</b>';
    }
    else{
        $status='<b style="color:green">Voted</b>';
    }
?>



<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
            #backbtn{
                padding: 10px;
                border-radius: 5px;
                background-color: #3498db;
                color: white;
                font-size: 15px;
                float: left;
                margin:10px;
            }
            #logoutbtn{
                padding: 10px;
                border-radius: 5px;
                background-color: #3498db;
                color: white;
                font-size: 15px;
                float: right;
                margin:10px;
            }
            #Profile{
                background-color: white;
                width: 28%;
                padding : 20px;
                float : left;
            }
            #Group{
                background-color: white;
                width: 65%;
                padding : 20px;
                float : right;
            }
            #votebtn{
                padding: 10px;
                border-radius: 5px;
                background-color: #3498db;
                color: white;
                font-size: 15px;
                float: left;
            }
            #mainpanel{
                padding: 10px;
            }
            
            
        </style>

        <div id="mainSection">

                <center>
                <div id="headerSection">
                <a herf="../"> <button id="backbtn"> Back </button> </a>
                <a href="logout.php"> <button id="logoutbtn"> Logout </button> </a>
                <h1>Online Voting System</h1>
                </div>
                </center>
                <hr>

        <div id="mainpanel">
            <div id="Profile">
                 <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height='100' width='100'></center> <br><br>
                 <b>Name : </b><?php echo $userdata['name'] ?><br><br>
                <b>Mobile : </b><?php echo $userdata['mobile'] ?><br><br>
                <b>Address : </b><?php echo $userdata['address'] ?><br><br>
                <b>Status : </b><?php echo $status ?><br><br>
            </div>

            <div id="Group">
                <?php 
                    if($_SESSION['groupsdata']){
                        for($i=0;$i<count($groupsdata);$i++){
                             ?>
                                <div>
                                    <img style="float : right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height='100' width='100'>
                                    <b>Group Name : </b><?php echo $groupsdata[$i]['name']?><br><br>
                                    <b>Votes : </b><?php echo $groupsdata[$i]['votes']?><br><br>
                                    <form action="../api/vote.php" method="post">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                        <input type="submit" name="votebtn" value="vote" id="votebtn"><br><br>
                                    </form>
                                </div>
                                <hr>

                            <?php
                        }
                    }
                    else{

                    }
                ?>
            </div>
            </div>

        </div>


       
    </body>
</html>