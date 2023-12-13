<?php
$valid=true;
if(isset($_POST['email']))
{
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
    else{
        if(!(preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/" , $password)))
        {
             $password_error="Password is not appropriate";
             $valid=false;
        }
    }
    if(empty($_POST['cpassword']))
    {
         $cpassword_error="Please enter the password";
         $valid=false;
    }
    else{
        if(!($password==$cpassword))
        {
             $cpassword_error= "Password does not match";
             $valid=false;
        }
    }

    if($valid==true)
    {
          $selectDatabase="SELECT * FROM `aida`.`student` WHERE `email`='".$email."'";
     $selectResult= mysqli_query($con,$selectDatabase);
     if(mysqli_num_rows($selectResult)>0)
     {
               echo "<script>alert('Email Already registered')</script>";
               $valid=false;
     }
    }
    
}
?>
