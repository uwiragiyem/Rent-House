<?php
            include 'session.php';
?>

<?php
             include '../connection.php';     
             $id= $_GET['id'];

             $sql = "SELECT houses.id,house_no,name,description,price FROM houses,categories where houses.category_id=categories.id and houses.id='$id'";
                    $result = $conn->query($sql);
                    
                      while($row = mysqli_fetch_array($result)) {

                        $n=$row['house_no'];
                        $name=$row['name'];
                        $d=$row['description'];
                        $p=$row['price'];
                        // $dep=$row['department'];
                       
                      }
                   
                 
                  
                                      ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>updae houses </title>
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
        <div class="card-header">UPDATE HOUSE</div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

        

            <div class="form-group">
              <label>HOUSE NUMBER</label>
              <input type="number" name="n" value="<?php echo $n; ?>" id="teacher_password" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div>
            <br/>

            <div class="form-group">
             
              <label>CATEGORY IS <?php echo $name; ?></label>
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
              <label>DESCRIPTION</label>
              <textarea name='d' class="form-control" ><?php echo $d; ?></textarea>
             
            </div>

            <br/>
            <div class="form-group">
              <label>PRICE</label>
              <input type="text" name="p" value="<?php echo $p; ?>" id="teacher_password" class="form-control" />
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

          $sql = "UPDATE `houses` SET `house_no` = '$n', `description` = '$d', 
          `price` = '$p', `category_id` = '$c'  WHERE `houses`.`id` = $id;";

          if (mysqli_query($conn, $sql)) {

            echo '<script>alert("Well updated")</script>';
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