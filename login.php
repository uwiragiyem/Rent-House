<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Login </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
 <?php
include 'bot.php';

?>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body style="background-color: rgb(90, 108, 188)">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            

              <div class="card mb-3">
                <div class="card-body">

                  <div class="pt-4 pb-2" style="padding:0.4cm">
                    <h5 class="card-title text-center pb-0 fs-4" style="color: rgb(90, 108, 188);">User Login </h5>
                                     </div>

                  <form class="row g-3 needs-validation" action='login.php' method='POST' novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">USERNAME</label>
                      <div class="input-group has-validation">
                
                        <input type="text" name="uname" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      </div>
                    </div>

                  
                    <div class="col-md-12">
                      <label for="yourpannel" class="form-label">User</label>
                      <select id="inputState" class="form-select" name="user">
                        <option value='admin'>admin</option>
                        <option value='user'>user</option>
                      </select>
                    </div>

                    
                    <div class="col-12">
                    <br/><br/><button class="btn btn-primary w-100" type="submit" name='login' style="background-color: rgb(90, 108, 188)">Login</button>
                    </div>
                   
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <?php


  

include 'connection.php';

@$login=$_POST["login"];
@$user=$_POST["user"];
@$username=$_POST["uname"];
@$pass=$_POST["password"];


if(isset($login))
{

        if($user=='admin')
        {
                $sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1)
                    {
                      $_SESSION['username'] = 'admin';
                      echo "<script>window.location='./admin/admin.php'</script>";
                      // exit();

                    }
                    else
                    {
                        echo '<script>alert("Incorect cridentios")</script>';

                        // exit();

                    }

        }
      elseif($user==='user')
        
        {
          $sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) === 1)
              {

                $sql1 = "SELECT id,username FROM users WHERE username='$username' AND password='$pass'";
                $result1 = mysqli_query($conn, $sql1);
                while($row = mysqli_fetch_array($result1)) {
                  $id= $row['id'];
                  $uname= $row['username'];
  
                  }
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $uname;
                echo "<script>window.location='./users/index.php'</script>";
                

              }
              else
              {
                echo '<script>alert("Incorect cridentios")</script>';

              }

        }else{
          echo '<script>alert("please choose user!")</script>';
        }

  }

     
  
 

?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>