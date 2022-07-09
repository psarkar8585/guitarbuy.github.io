<?php
session_start();

include 'server.php';
//if(isset($_GET['token'])){
  $token = $_GET['token'];

  $updatequery = "update user set status = 'active' where token='{$token}' ";


  $query = mysqli_query($conn, $updatequery);

  // if($query){
  //   if(isset($_SESSION['msg'])){
  //     $_SESSION['msg'] = "Mail ID verified!!";
  //     header('location : loginpage2.php ');
  //   }
  //   else{
  //     $_SESSION['msg'] = "LOG OUT!!";
  //     header('location : loginpage1.php ');

  //   }
  // }
  // else{
  //   $_SESSION['msg'] = "Please Check !!";
  //   header('location : login.php ');

  // }

  if($query){
   
    ?>

  <h2>You are verified!!</h2>
  <a href="loginpage2.php" class="btn btn-primary">Procced</a>

<?php
  }else{
    echo "please check your mail <br/>".$token;
  }
  
//}
?>