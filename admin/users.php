<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>users </title>
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
        


        <div class="col-md-4">
        <div class="col-md-12" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">ADD USERS</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

         

            <div class="form-group">
              <label>NAMES</label>
              <input type="text" name="n"  class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            <div class="form-group">
              <label>USERNAME</label>
              <input type="text" name="un"  class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            <div class="form-group">
              <label>PASSWORD</label>
              <input type="password" name="p"  class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>


            <div class="form-group">
              <label>COMFIRM-PASSWORD</label>
              <input type="password" name="cp"  class="form-control" />
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


            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="ADD USER" />

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
       
        <div class="col-md-8">
        <!-- <div class="col-lg-12"> -->
  


        <?php
                    include '../connection.php';
	
                    $sql = "SELECT * FROM users where type!='admin'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                      ?>
                       <br/>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List of users</h5>

      <!-- Table with stripped rows -->

      <br/>
      <table class="table  table-responsive">
        <thead>
          <tr>
            <th scope="col">NO</th>
            
            <th scope="col">NAME</th>
            <th scope="col">USERNAME</th>
            <th scope="col">TYPE</th>
         
            <th scope="col" colspan="3" style="text-align:center">Modify</th>
          </tr>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                    $sql = "SELECT * FROM users where type!='admin'";
                
                    	
                    	
                    
                    	
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       ?>

                          <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["username"];?></td>
                      <td><?php echo $row["type"];?></td>
                      
                      
                     
                      <td> <a href="delete_users.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-trash-fill bi-bg-danger" ></i> </a></td>
                      <td>  <a href="update-user.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-pencil-square"></i> </a> </td>

                    </tr>
                       <?php
                      }
                    } else {
                      echo "0 results";
                    }
                  ?>
                 
       
     
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    <!-- </div> -->
  </div>

 

  

</div>

<?php
                    }else{
                      ?>
                       <br/>
                  <div class="card">
    <div class="card-body">
      <h5 class="card-title">there is no  user recorded</h5>
    </div></div>

                    <?php
                    }
                    ?>

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
@$n=$_POST["n"];
@$un=$_POST["un"];
@$p=$_POST["p"];
@$cp=$_POST["cp"];
@$t=$_POST["t"];



      if(isset($go))
    {
	if($n!='' OR $d!='' OR $p!='')
	{
	  

        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES (NULL, '$n', '$un', '$p', '$t');";

          if (mysqli_query($conn, $sql)) {

            echo '<script>alert("user Added successfull")</script>';
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