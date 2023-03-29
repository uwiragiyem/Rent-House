<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>categories </title>
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
        <div class="card-header">ADD CATEGORY</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

         

            <div class="form-group">
              <label>NAME</label>
              <input type="text" name="name"  class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

           
      
            <br/>
            
            

            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="ADD CATEGORY" />

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
	
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                      ?>
                       <br/>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List of categories</h5>

      <!-- Table with stripped rows -->

      <br/>
      <table class="table  table-responsive">
        <thead>
          <tr>
            <th scope="col">NO</th>
            
            
            
            <th scope="col">NAME</th>
            
           
            <th scope="col" colspan="3" style="text-align:center">Modify</th>
          </tr>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                    $sql = "SELECT id,name FROM categories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       ?>

                          <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row["name"];?></td>
                     
                      
                     
                      <td> <a href="delete_categories.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-trash-fill" ></i> </a></td>
                      <td>  <a href="update-categories.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-pencil-square"></i> </a> </td>

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
      <h5 class="card-title">there is no any recorded</h5>
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
@$name=$_POST["name"];
// @$email=$_POST["email"];
// @$availability=$_POST["availability"];
// @$desc=$_POST["desc"];
// @$status=$_POST["status"];
// $date=Date('d-m-Y');



      if(isset($go))
    {
	if($name!='')
	{
	  

        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "INSERT INTO `categories` (`id`, `name`) VALUES ('', '$name')";

          if (mysqli_query($conn, $sql)) {

            echo '<script>alert("categories Added successfull")</script>';
            echo "<script>window.location='./categories.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);
      
	  }else{
		 echo '<script>alert("Make sure all field are filled")</script>';
	  }
	  
	  
	  
	  }
	  


?>