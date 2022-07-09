<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "guiterbuy";

//create a connection
$conn = mysqli_connect($host, $dbusername, $dbpassword,$dbname);

if(isset($_POST['submit'])){
  
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
  $password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $cpassword = mysqli_real_escape_string($conn,md5($_POST['cpassword']));
  $token = bin2hex(random_bytes(15));



  if(!empty($username)){
    $emailquery = "select * from  registration where email = '$emailid'";
    $query = mysqli_query($conn,$emailquery);

    if($query!=0){
      echo "Email already exist";
    }
    else{
      if(!empty($password) &&  ($password === $cpassword)){

      
        $sql = "INSERT INTO user (username , emailid , password , cpassword , token , status) values ('$username' , '$emailid' , '$password' ,'$cpassword' , '$token', 'inactive')";
        $sql_query = mysqli_query($conn,$sql);
    
        if($sql_query){
          //echo "New Record is inserted!!";
          
          $to = $emailid;
          $subject = "verification mail!!";
          $body = "hi, $username. CLICK HERE!! to active your account http://localhost/guitarBuy/activate.php?token=$token  ";
          $headers = "From: divinecandids1999@gmail.com";
          $mailsent = mail($emailid,$subject,$body,$headers);
          if ($mailsent){
            $_SESSION['msg'] = "check your mail to verify your mail id $emailid ";
            header('location: loginpage2.php');
          }

        }
      }
      else{
        echo"Error: ". $sql . "<br>" . $conn -> error;
      }
      $conn -> close ();
    }
  }

      
  else{
    echo "Please Enter Your User Name & Password!!";
    die();
  }
}
  

  // else{
  //   echo "Please Enter Your UserName!!";
  //   die();
  // }
?>