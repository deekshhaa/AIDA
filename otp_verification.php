<?php 
session_start();
    if(isset($_POST["verify"])){
         $otp_g = $_SESSION['otp'];
         $otp_code = $_POST['otp'];
        
        if($otp_g != $otp_code){
          ?>
           <script>
               alert("Invalid OTP!");
               window.location.replace("otp_verification.php");
           </script>
           <?php
        }else{
          ?>
             <script>
                   window.location.replace("insert.php");
             </script>
             <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        * {
            margin: 0px;
        }

        .conatiner {
            position: absolute;
            background-color: aqua;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;

        }

        .display {
            background-color: rgb(126, 135, 135);
            height: 73%;
            width: 40%;
            margin: auto;
            text-align: center;
            border: solid 2px black;
            border-radius: 133px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .display h2 {
            margin: 20px;
        }

        .display p {
            margin: 80px 0px 30px 0px;
        }

        #otp {
            height: 40px;
            width: 250px;
            border: solid 2px rgb(255, 255, 255);
            border-radius: 30px;
            font-size: 30px;
            text-align: center;
            display: block;
        }
        #otp:hover{
            border: solid 2px black;
            background-color: aquamarine;
        }

        #submit {
            margin: 30px;
            height: 40px;
            width: 100px;
            font-size: 20px;
            border: solid 1px rgb(255, 255, 255);
            border-radius: 20px;
            cursor: pointer;
        }
        #submit:hover{
            border: solid 1px black;
            background-color: aquamarine;
        }
    </style>
</head>

<body>
    <div class="conatiner">
        <div class="display">
            <H2>OTP has been sent on your email ID</H2>
            <hr width="80%" color="black">
            <p>Go to your email ID,OTP has been sent on your email id</p>
            <div class="">
                <form action="" method="post" target="_self">
                    <input type="text" id="otp" name="otp">
                    <input type="submit" id="submit" value="submit" name="verify">
                </form>

            </div>
        </div>
    </div>
</body>

</html>