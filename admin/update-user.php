<?php
            include 'session.php';
?>

<?php
             include '../connection.php';     
             $id= $_GET['id'];

             $sql = "SELECT * FROM `users` where id='$id'";
                    $result = $conn->query($sql);
                    
                      while($row = mysqli_fetch_array($result)) {

                        $name=$row['name'];
                        $uname=$row['username'];
                        $type=$row['type'];
                        
                       
                      }
                   
                 
            ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UPDATE USER </title>
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
        <div class="card-header">UPDATE USER</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

        

            <div class="form-group">
              <label>FIRST NAME</label>
              <input type="text" name="fname" value="<?php echo $name; ?>" id="teacher_password" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            <div class="form-group">
              <label>LAST NAME</label>
              <input type="text" name="uname" value="<?php echo $uname; ?>" id="teacher_password" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            <div class="form-group">
              
              <label>USER TYPE</label>
              <select id="inputState" class="form-select" name="t">
                
                              
                              <option  value='user'>user</option>
                              
                       
                        
                      </select>
            </div>
            <br/>
            
            <!-- <div class="form-group">
              <label>DEPARTMENT NAME</label>
              <input type="text" name="dep" value="<?php echo $dep; ?>" id="teacher_password" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div> -->
            <br/>

            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="SAVE CHANGES" />

              <input type="reset" name="reset" id="teacher_login" class="btn btn-danger" value="CLEAN DATA" />
            </div>
          </form>
        </div>
      </div>
    </div>
        </div>
        <div class="col-md-4"></div>
        </div>
        <!-- //row -->
<br/>
       
</div>
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
@$name=$_POST["fname"];
@$u=$_POST["uname"];
@$t=$_POST["t"];
// @$dep=$_POST["dep"];



      if(isset($go))
    {
	if($fname!='' OR $u!='' OR $t!='')
	{
	  

        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "UPDATE `users` SET `name` = '$name', `username` = '$u', 
          `type` = '$t' WHERE `users`.`id` = $id;";

          if (mysqli_query($conn, $sql)) {

            echo '<script>alert("Well updated")</script>';
            echo "<script>window.location='./users.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);
      
	  }else{
		 echo '<script>alert("Make sure all field are filled")</script>';
	  }
	  
	  
	  
	  }
	  


?>