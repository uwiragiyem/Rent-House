<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>add house </title>
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
        <div class="card-header">ADD HOUSE</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

         

            <div class="form-group">
              <label>HOUSE NUMBER</label>
              <input type="number" name="n"  class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            <div class="form-group">
              <label>CATEGORY</label>
              <select id="inputState" class="form-select" name="c">
                      <!-- <option selected>Choose...</option> -->

                      <?php
                            include '../connection.php';
          
                            $sql = "SELECT id,name FROM categories";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_array($result)) {
                              // echo "id: " . $row["id"]. " - Name: " . $row["reg_number"]. " " . $row["1"]. "<br>";
                              ?>
                            
                              
                              <option  value='<?php echo $row["0"];?>'><?php echo $row["1"];?></option>
                              
                              <?php
                              }
                            } else {
                              echo "0 results";
                            }
                          ?>
                                
                        
                      </select>
            </div>
            <br/>

            
            <div class="form-group">
              <label>description</label>
              <textarea name='d' class="form-control"></textarea>
             
            </div>
      
            <br/>

            <div class="form-group">
              <label>price</label>
              <input type="number" name="p" id="teacher_password" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            
            

            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="ADD HOUSE" />

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
	
                    $sql = "SELECT houses.id,house_no,name,description,price,house_status FROM houses,categories where houses.category_id=categories.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                      ?>
                       <br/>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List of houses</h5>

      <!-- Table with stripped rows -->

      <br/>
      <table class="table  table-responsive">
        <thead>
          <tr>
            <th scope="col">NO</th>
            
            <th scope="col">number</th>
            <th scope="col">category</th>
            <th scope="col">description</th>
            <th scope="col">price</th>
            <th scope="col">house status</th>
            <th scope="col" colspan="3" style="text-align:center">Modify</th>
          </tr>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                    $sql = "SELECT houses.id,house_no,name,description,price,house_status FROM houses,categories where houses.category_id=categories.id";
                
                    	
                    	
                    
                    	
                    
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       ?>

                          <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row["house_no"];?></td>
                      <td><?php echo $row["name"];?></td>
                      <td><?php echo $row["description"];?></td>
                      <td><?php echo $row["price"];?></td>
                      <td><?php echo $row["house_status"];?></td>
                      
                     
                      <td> <a href="delete_house.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-trash-fill" ></i> </a></td>
                      <td>  <a href="update-house.php?id=<?php echo $row["id"]  ?>"><i class="bi bi-pencil-square"></i> </a> </td>

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
      <h5 class="card-title">there is no house recorded</h5>
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
@$d=$_POST["d"];
@$p=$_POST["p"];
@$c=$_POST["c"];
// @$status=$_POST["status"];
// $date=Date('d-m-Y');



      if(isset($go))
    {
	if($n!='' OR $d!='' OR $p!='')
	{
	  

        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "INSERT INTO `houses` (`id`, `house_no`, `category_id`, `description`, `price`, `house_status`) 
          VALUES (NULL, '$n', '$c', '$d', '$p','untaken')";

          if (mysqli_query($conn, $sql)) {

            echo '<script>alert("house Added successfull")</script>';
            echo "<script>window.location='./add-house.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);
      
	  }else{
		 echo '<script>alert("Make sure all field are filled")</script>';
	  }
	  
	  
	  
	  }
	  


?>