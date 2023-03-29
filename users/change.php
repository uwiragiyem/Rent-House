<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CHANGE PASSWORD </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php
            include 'bot.php';
         ?>

</head>

<body>

<div class="container-fluid ">
    <div class="row header">
  
        <?php
            include 'header.php';
         ?>
       
    </div>

    <div class="row">
        <div class="col-md-2 menudiv">  
         <?php
            include 'menu.php';
         ?>

        </div>
        <div class="col-md-10"> 

        <div class="row"> 
      <!-- //empt -->
        

      <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="col-md-12" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">CHANGE PASSWORD</div>
        <div class="card-body">
        <form method="post" id="teacher_login_form">

        
  <div class="form-group">
  <label>CURRENT PASSWORD</label>
  <input type="password" name="cp"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>

<br/>
<div class="form-group">
  <label>NEW PASSWORD</label>
  <input type="password" name="np"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>
<div class="form-group">
  <label>COMFIRM PASSWORD</label>
  <input type="password" name="cop"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>




<div class="form-group">
  <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="SAVE CHANGES" />

  <input type="reset" name="reset" id="teacher_login" class="btn btn-danger" value="CLEAN DATA" />
</div>
</form>
        </div>
      </div>
      </div></div>
        <!-- <div class="col-md-4"></div> -->
       
        <!-- //row -->
<br/>
        <!-- <div class="row"> -->
       
        
        </div>
        </div>
    

        <!-- //main cont -->
        </div>
      
      </div>
        <!-- <div class="col-md-12">  </div> -->
  
    </div>
</div>







  

</body>

</html>

<?php
include '../connection.php';




@$go=$_POST["submit"];

// @$reg=$_POST["reg"];
@$cp=$_POST["cp"];
@$np=$_POST["np"];
@$cop=$_POST["cop"];



$my_qz ="select password from users  WHERE id='$myid'";
                        $resz= $conn->query($my_qz);

                        while($rowz = mysqli_fetch_array($resz)) {

                           $dp=$rowz['0'];
                       
                         }








      if(isset($go))
    {
        if($np!='' OR $cp!=''  OR $cop!='' )
	{
    if($np==$cop)
    {

      if($cp==$dp)
      {

      $si = "UPDATE `users` SET `password` = '$np' WHERE `users`.id='$myid'";
            $re = $conn->query($si);
            if($re)
            {
              echo '<script>alert("password  updated sucessfull")</script>';
              echo "<script>window.location='./index.php'</script>";
             }
      }else{
        echo '<script>alert("new password missmatch wiht current password")</script>';
       }


     }else{
      echo '<script>alert("password missmatch")</script>';
     }

      
	  }else{
		 echo '<script>alert("Make sure all field are filled")</script>';
	  }
	  
	  
	  
	  }
	  


?>