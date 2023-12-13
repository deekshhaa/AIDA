<?php
session_start();
$email=$_SESSION['email'];
    $password=$_SESSION['password'];
    // echo $email;
    //         echo $password;
    $server="localhost";
        $username="root";
        $pass="";
        $con=mysqli_connect($server,$username,$pass);
        if(!$con)
        {
            die("connection to this database failed due to ".mysqli_connect_error());
        }
        $selectDatabase="SELECT * FROM `aida`.`student` WHERE `email`='".$email."'";
     $selectResult= mysqli_query($con,$selectDatabase);
     if(mysqli_num_rows($selectResult)>0)
     {
        
               echo "<script>alert('Email Already registered')</script>";
               ?>
<script>
    window.location.replace("AIDAconnect.html");
</script>
<?php
            //    $valid=false;
     }
     else{
        $sql="INSERT INTO `aida`.`student` (`email`, `password`, `dt`) VALUES ('$email','$password', current_timestamp())";
        if($con->query($sql)==true)
        {   ?>
<script>
    alert("You have been Successfully Registered.");
    window.location.replace("chatbot_S.html");
</script>
<?php
        }   
        else
            echo "ERROR: $sql <br> $con->error";
            
            $con->close();
     }
        

?>