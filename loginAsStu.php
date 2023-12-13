<?php
// LOGIN AS STUDENT
$email =null;
$password = null;
$email_error=null;
$password_error=null;
$valid=true;
session_start();
if(isset($_POST["submitt"])) 
{  
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty(trim($email)))
    {
         $email_error="Please enter the Banasthali ID";
         $valid=false;
    }
    else{
        if(!(preg_match("/^[a-zA-Z]{5}[1-9][0-9]{4}_\w+@banasthali.in$/" , $email)))
        {
             $email_error="Please enter valid Banasthali ID";
             $valid=false;
        }
    }
    if(empty($_POST['password']))
    {
         $password_error="Please enter the password";
         $valid=false;
    }
if($valid==true)
{
    $server="localhost";
        $username="root";
        $pass="";
        $con=mysqli_connect($server,$username,$pass);
        if(!$con)
        {
            die("connection to this database failed due to ".mysqli_connect_error());
        }
        $selectDatabase="SELECT * FROM `aida`.`student` WHERE `email`='".$email."' AND `password`='".$password."'";
     $selectResult= mysqli_query($con,$selectDatabase);
     $selectDatabase1="SELECT * FROM `aida`.`student` WHERE `email`='".$email."'";
     $selectResult1= mysqli_query($con,$selectDatabase1);
    //  $passs=mysqli_query($con,$paas);
     if(mysqli_num_rows($selectResult)>0)
     {
        // updating timestamp in database
$sql="UPDATE `aida`.`student` SET dt=current_timestamp() WHERE `email`='".$email."' AND `password`='".$password."'";

        ?>
<script>
    window.location.replace("chatbot_S.html");
</script>
<?php
            

     }
     else if((mysqli_num_rows($selectResult1)>0)&&!mysqli_num_rows($selectResult)>0)
     {
        ?>
<script>
    alert("Incorrect Password");
</script>
<?php
     }
     else
     {
        ?>
<script>
    alert("Banasthali ID not found.");
</script>
<?php
     }
    $con->close();
}
    
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <?php

    if($email_error!=null)
    {
       ?>
    <style>
        #eError {
            display: block;
        }

        .details input {
            margin: 20px 20px 0px 20px;
        }

        #email {
            border: solid 2px red;
        }
    </style>
    <?php
    }
    if($password_error!=null)
    {
       ?>
    <style>
        #pError {
            display: block;
        }

        .details input {
            margin: 20px 20px 0px 20px;
        }

        #password {
            border: solid 2px red;
        }
    </style>
    <?php
    }

?>

    <style>
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        .container {
            background-image: url("images/back2.jpg");
            border: solid 2px black;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .content {
            height: 80%;
            /* border: solid 2px rgb(231, 15, 15); */
            box-shadow: 0px 0px 20px rgb(23, 23, 51);
            /* background-color: rgb(255, 255, 255); */
            border-radius: 90px;
            width: 50%;
            display: flex;
            /* align-items: center;
            justify-content: center; */
            margin: auto;
        }



        .content button:hover {
            font-weight: 550;
            cursor: pointer;
            background-color: rgb(109, 109, 159);
        }

        .details {
            /* border: solid 2px greenyellow; */
            width: 80%;
            height: 90%;
            margin: auto;
            text-align: center;
        }

        .details h1 {
            margin: 25px 0px 20px 0px;
            text-align: center;
        }

        .details label {
            font-size: 20px;
            /* border: solid 2px greenyellow; */
        }

        .details input {
            height: 30px;
            width: 350px;
            margin: 20px 20px 20px 20px;
            font-size: 20px;
            padding: 15px;
        }

        .details button {
            border: solid 0.5px green;
            border-radius: 8px;
            width: 70%;
            background-color: rgb(239, 245, 245);
            font-size: 20px;
            margin: 50px 0px 0px 0px;
            padding: 5px;
            text-align: center;
        }

        .details form {
            margin: 40px 0px;
        }

        .displayError {
            color: red;
            width: 300px;
            font-size: 17px;
            /* background-color: rgb(163, 130, 130); */
            margin-left: 20px;
            visibility: visible;
            display: none;
        }

        .fsec {
            text-decoration: none;
            color: black;
        }

        .forgot {
            margin: 0px 0px 0px 250px;
            width: 35%;

            /* border: solid 2px red; */
        }

        .extra {
            margin-top: 50px;
        }

        .extra a {
            text-decoration: none;
        }

        .extra a:hover {
            cursor: pointer;
            text-decoration: underline;
            color: rgb(26, 26, 128);
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="content">

            <div class="details">
                <h1>Login Form</h1>
                <hr color="black">
                <form action="" method="post" autocomplete="off">
                    <table>
                        <tr>
                            <td><label for="">Email Id:</label></td>
                            <td><input type="text" name="email" id="email">
                                <p class="displayError" id="eError">
                                    <?php echo $email_error ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Password:</label></td>
                            <td><input type="password" name="password" id="password">
                                <p class="displayError" id="pError">
                                    <?php echo $password_error ?>
                                </p>
                                <!-- <a href="" class="fsec"><p class="forgot">Forgot Password?</p></a></td> -->
                        </tr>
                    </table>



                    <!-- <hr width="70%" size="4" color="purple"> -->



                    <!-- <hr width="70%" size="4" color="purple"> -->
                    <!-- <input type="submit" class="btn"> -->
                    <button name="submitt">Submit</button>
                </form>
                <div class="extra">
                    <p>New user? <a href="register.php">Click Here</a> to register</p>
                </div>
            </div>

        </div>
</body>

</html>