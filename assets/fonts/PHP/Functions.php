<?php

function SignIn($conn){
    if (isset($_POST['SignIn'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $sql = "SELECT * FROM `users` WHERE `Username`='$Username' AND `Password`='$Password'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result)> 0) {
            if ($row = $result-> fetch_assoc()) {
                $_SESSION['ID'] = $row['ID'];
                 echo "<script type='text/javascript'>location.href = 'index.php';</script>";
                header("Location: index.php");
                exit();
            }       
        }else {
             echo "<script type='text/javascript'>location.href = 'index.php';</script>";
            header("Location: index.php");
            exit();
        }    
    }

}

function SignUp($conn){
    if (isset($_POST['SignUp'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        $FB = $_POST['FB'];      
            $sql = "INSERT INTO `users`(`Username`,`Password`,`FB`) VALUES ('$Username','$Password','$FB')";
            $result = $conn->query($sql);           
            echo "<script type='text/javascript'>location.href = 'index.php';</script>";
            header("Location:index.php?SignupSuccessful");  
            exit();
    }
}

function SignOut(){
  
        session_start();
        session_destroy();
        header("Location:index.php");
        exit();
    
}

function PostTimeline($conn){
    if (isset($_POST['Post'])) {
        $ID = $_SESSION['ID'];
        $sql = "SELECT * FROM `users` WHERE `ID` LIKE '$ID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $Username = $row['Username'];
        $FB = $row['FB'];
        $Title= $_POST['title'];
        $Content= $_POST['Message'];
        $sql = "INSERT INTO `post` (`Username`,`title`,`Content`, `FB`) VALUES ('$Username','$Title','$Content', '$FB')";
        $result = $conn->query($sql);
        echo "<script type='text/javascript'>location.href = 'index.php';</script>";
       header("Location:index.php");
       exit();
           
    }
}


function DisplayPost($conn){
    $sql = "SELECT * FROM `post` ORDER BY `ID` DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $limitletters = strlen($row['title']);
        $post = substr($row['title'], 0, 30);
        if(is_numeric($limitletters)){
            if($limitletters <= 30){
                $filalpost = $post;
            }else{
                $filalpost = $post. ". . .";
            }
        }
        
        echo "<div class='col-sm-6 col-md-5 col-lg-4 item'>
                    <div class='box'><i class='fa fa-user-circle icon'></i>
                        <h3 class='name'>".$row['Username']."</h3>
                        <p class='description'>$filalpost</p><a class='learn-more' href='View.php?PostId=".$row['ID']."'>View Post »</a>
                        <h3 class='name'>".$row['Created']."</h3>                      
                    </div>
                </div>";
                
    }       
}

function supporters($conn){
    $sql = "SELECT * FROM `Supporters`";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {       
            echo   "<div class='col-md-6 col-lg-4 item'><img class='rounded-circle' src='assets/img/1.png'>
                    <h3 class='name'>".$row['Fullname']."</h3>
                    <p class='title'>Supporter</p>
                    <p class='description'>".$row['Created']."</p>
                    <div class='social'><a target='_blank' href='".$row['FB']."'><i class='fa fa-facebook-official'></i></a><a href='#'><i class='fa fa-twitter'></i></a><a href='#'><i class='fa fa-instagram'></i></a></div>
                </div>";
    }
}

function viewpostcomment($conn) {
    $PostID = $_GET['PostId'];
    $sql = "SELECT * FROM `comments` WHERE `PostID` LIKE '$PostID' ORDER BY `ID` DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {

    echo " <div class='item'>
    <div class='row'>
        <div class='col-md-6'>
            <h3>".$row['Username']."</h3>
            <h4 class='organization'>TLS - Team Learning Session</h4>
        </div>
        <div class='col-md-6'><span class='period'>".$row['created']."</span></div>
    </div>
    <p class='text-muted'>".$row['Comment']."</p>
</div>";

    }
}

function viewpost($conn) {
    $PostID = $_GET['PostId'];
    $sql = "SELECT * FROM `post` WHERE `ID` LIKE '$PostID'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    echo "<p>User: ".$row['Username']."</p>
    <p>".$row['title']."</p>
    <p>".$row['Content']."</p>
    <a class='btn btn-outline-primary' role='button' href='#'>Share</a></div>";
}


function PostComment($conn){
    if (isset($_POST['Post'])) {
        $ID = $_SESSION['ID'];
        $sql = "SELECT * FROM `users` WHERE `ID` LIKE '$ID'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $Username = $row['Username'];
        $PostID =  $_GET['PostId'];
        $Message= $_POST['Message'];
        $sql = "INSERT INTO `comments` (`PostID`,`Username`,`Comment`) VALUES ('$PostID','$Username','$Message')";
        $result = $conn->query($sql);
        
       header("Location:view.php?PostId=".$PostID);
       exit();
           
    }
}