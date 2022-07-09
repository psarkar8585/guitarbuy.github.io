<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "guiterbuy";

//create a connection
$conn = mysqli_connect($host, $dbusername, $dbpassword,$dbname);
session_start();
?>
<!-- <!DOCTYPE html>
<html lang="en"> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuitarBuy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="login.css">
    <style>
      body{
        background-image: url(abc2.jpg); 
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur();
      }
    </style> 
</head>
<body>

      <?php
        //include 'server.php';
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $userquery = "select * from  user where username = '{$username}'";
            $query = mysqli_query($conn,$userquery);
            $user_pass = mysqli_fetch_assoc($query);

            //$username_count = mysqli_num_rows($query);
            if($user_pass != 0){
                
                $db_pass = $user_pass['password'];
                //$password_decode = password_verify(password,);

                if($db_pass === $password){
                    //echo "<script>alert('Hi!')</script>";
                    header('location: store1.html');
                }
                else{
                    echo "<script>alert('Password Incorrect !!')</script>";
                    echo " Password Incorrect !! ";
                }
            }
            else{
                echo "<script>alert('Invailed User Name!!')</script>";
                echo "Invailed User Name";
            }
        }

      ?>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">GuitarBuy</a>
    </div>
  </nav>
<section>
  <div class="container mt-5 pt-6 ">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-6 m-auto">
        <div class="card">
          <div class="card-body">
            <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="500" height="30" fill="currentColor"  class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <div>
                <p class="bg-light-sucess text-white px4">Enter your User Name and Password!!</p>
            </div>
            <form method=post>
              <input type="text" name="username" id="" class="form-control my-4 py-2" placeholder="User Name"/>
  
              <input type="password" name="password" id="" class="form-control my-4 py-2" placeholder="Password"/>
              <div class="text-container mt-3">
                <input type="checkbox" id="check">
                <label for="check"><a class ="checkbox">Remember Me</a></label>
                </div>

              <div class="text-container mt-3">
                
                <input type="submit" name="submit" class="btn btn-primary mx-auto btn-block" value="Sign In" />
                <a href="login.html" class="nav-link"> Don't have any account?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>