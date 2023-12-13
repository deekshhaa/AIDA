<?php
$email_error=null;
$password_error=null;
$cpassword_error=null;
$email =null;
$password = null;
$cpassword = null;
session_start();
if(isset($_POST['continue'])) 
{
    $server="localhost";
    $username="root";
    $pass="";
    $con=mysqli_connect($server,$username,$pass);
    if(!$con)
    {
        die("connection to this database failed due to ".mysqli_connect_error());
    }

    $valid=false;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword']; 
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    include ("valid.php");

if($valid==true)
{
    include ("otp.php");
}
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="valid.js">
    <link rel="stylesheet" href="register.css">
    <?php
    if($email_error!=null)
    {
       ?>
    <style>
        #eError {
            display: block;
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

        #password {
            border: solid 2px red;
        }
    </style>
    <?php
    }
    if($cpassword_error!=null)
    {
       ?>
    <style>
        #cError {
            display: block;
        }

        #cpassword {
            border: solid 2px red;
        }
    </style>
    <?php
    }

?>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="details">
                <h1>Registration</h1>
                <hr color="black">
                <form action="" method="post" target="_self">
                    <table>
                        <tr>
                            <td><label for="">Email Id:</label></td>
                            <td><input type="text" name="email" id="email" value="<?php echo $email ?>">
                                <p class="displayError" id="eError">
                                    <?php echo $email_error ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="">Password:</label></td>
                            <td><input type="password" name="password" id="password" value="<?php echo $password ?>">
                                <p class="displayError" id="pError">
                                    <?php echo $password_error ?>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="">Confirm Password:</label></td>
                            <td><input type="password" name="cpassword" id="cpassword" value="<?php echo $cpassword ?>">
                                <p class="displayError" id="cError">
                                    <?php echo $cpassword_error ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <button name="continue">Continue</button>
                </form>
                <div class="extra">
                    <p>Already user? <a href="loginAsStu.php">Click Here</a> to login-in </p>
                </div>

</body>

</html>