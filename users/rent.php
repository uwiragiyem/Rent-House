<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RENT </title>
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
        


        <div class="col-md-3">
        <div class="col-md-12" style="margin-top:20px;">
      <div class="card">
        <div class="card-header">RENTING</div>
        <div class="card-body">
        <form method="post" id="teacher_login_form">

        

<div class="form-group">
  <label>FIRST NAME</label>
  <input type="text" name="fn"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>


<div class="form-group">
  <label>LAST NAME</label>
  <input type="text" name="ln"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>

<div class="form-group">
  <label>EMAIL</label>
  <input type="email" name="e"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>

<div class="form-group">
  <label>PHONE</label>
  <input type="text" name="phone"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>

<div class="form-group">
  <label>DATE IN</label>
  <input type="date" name="din"  id="teacher_password" class="form-control" />
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>

<div class="form-group">
 
  <label>HOUSE TO RENT</label>
  <select id="inputState" class="form-select" name="h">
          <!-- <option selected>Choose...</option> -->

          <?php
                include '../connection.php';

                $sql = "SELECT houses.id,house_no,name FROM houses,categories where houses.category_id=categories.id and house_status='untaken'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_array($result)) {
                  // echo "id: " . $row["id"]. " - Name: " . $row["reg_number"]. " " . $row["1"]. "<br>";
                  ?>
                
                  
                  <option  value='<?php echo $row["0"];?>'><?php echo "number__:".$row["1"]."____category name:".$row["2"];?></option>
                  
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
  <label>DURATION</label>
  <select id="inputState" class="form-select" name="duration">
      
                  
                  <option  value='1 month'>1 month</option>
                  <option  value='2 month'>2 month</option>
                  <option  value='3 month'>3 month</option>
                  
             
                    
            
          </select>
</div>
<br/>


<div class="form-group">
  <label>PAYMENT STATUS</label>
  <input type="text" name=""  id="teacher_password" class="form-control" value='paid' disabled/>
  <span id="error_teacher_password" class="text-danger"></span>
</div>
<br/>




<div class="form-group">
  <input type="submit" name="submit" id="teacher_login" class="btn btn-info" value="SAVE " />

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
       
        <div class="col-md-9">
        <!-- <div class="col-lg-12"> -->
  


        <?php
                    include '../connection.php';
	
                    $sql = "select customers.fname,customers.lname,houses.house_no,customers.date_in,customers.date_out,customers.duration,payments.amount from categories,customers,payments,houses,users where customers.h_id=houses.id and houses.category_id=categories.id and customers.id=payments.customerid and users.id=customers.user and users.id='$myid'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                      ?>
                       <br/>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">customer details</h5>

      <!-- Table with stripped rows -->

      <br/>
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
          <table class="table" style="width: 100%">
        <td>FIRST NAME</td> <td>LAST NAME</td>  <td>HOUSE NUMBER</td> <td>DATE IN</td>
                        <td>DATE OUT</td> <td>DURATION</td> <td>AMOUNT</td><td>STATUS</td>
        </thead> 
        <tbody>

        <?php
                    include '../connection.php';
	
                    $sql = "select customers.fname,customers.lname,houses.house_no,customers.date_in,customers.date_out,customers.duration,payments.amount,customers.id,house_status from categories,customers,payments,houses,users where customers.h_id=houses.id and houses.category_id=categories.id and customers.id=payments.customerid and users.id=customers.user and users.id='$myid'";
    
                    $result = $conn->query($sql);
                    
                    $i=0;
                    $sum=0;
                     while($row = mysqli_fetch_array($result)) {
                      $i++;

                      $fname=$row["0"];
                      $lname=$row["1"];
                      $h=$row["2"];
                      $datein=$row["3"];
                      $dateout=$row["4"];
                      $duration=$row["5"];
                      $amount=$row["6"];
                      $status=$row["8"];
                      $sum=$sum+$amount;

                      ?>

                     <tr>
                       <td><?php echo $fname; ?></td> <td><?php echo $lname; ?></td>  <td style='text-align:center'><?php echo $h; ?></td> <td><?php echo $datein; ?></td>
                       <td><?php echo $dateout; ?></td> <td><?php echo $duration; ?></td> <td><?php echo $amount."Rrwf"; ?></td><td><?php if($status=='taken'){
                            echo 'still living';
                        } else{
                            echo 'not living';
                        } ?></td>
                       <td> <a href="view_customer.php?id=<?php echo $row["7"]  ?>"> <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="view" /></i> </a></td>
                       <!-- <td> <a href="view_applicants.php?id=<?php //echo $row["id"]  ?>"> <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="view" /></i> </a></td> -->
                     </tr>

                      

                      

                      <?php
                     }?>
                     
                     </table>
                 
       
     
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
      <h5 class="card-title">0 record</h5>
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
@$fn=$_POST["fn"];
@$ln=$_POST["ln"];
@$e=$_POST["e"];
@$d=$_POST["din"];
@$dr=$_POST["duration"];
@$h=$_POST["h"];
// @$pay=$_POST["pay"];
@$phone=$_POST["phone"];

// $out=date_add($d, $dr);


$dt = strtotime("$d");
$out= date("Y-m-d", strtotime("+$dr", $dt));


$s = "SELECT price FROM houses where id='$h'";
            $re = $conn->query($s);

          
              while($rowx = mysqli_fetch_array($re)) {
               $price=$rowx['0'];
              }

if(@$dur=='1 month'){

    $amount=$price;

}else if(@$dur=='2 month'){

    $amount=$price*2;

}else{
    @$amount=$price*3;
}







      if(isset($go))
    {
        if($fn!='' OR $ln!=''  OR $e!='' OR $d!='' OR $dura!='' OR $dura!='' )
	{
	  

          $sql = "INSERT INTO `customers` (`id`, `fname`, `lname`, `email`, `phone`, `h_id`, `status`, `date_in`, `date_out`, `duration`, `user`)
           VALUES (NULL, '$fn', '$ln', '$e', '$phone', '$h', 'active', '$d', '$out', '$dr', '$myid');";

          if (mysqli_query($conn, $sql)) {

            
            $si = "UPDATE `houses` SET `house_status` = 'taken' WHERE `houses`.id='$h'";
            $re = $conn->query($si);



            $s = "SELECT id FROM customers where h_id='$h'";
            $re = $conn->query($s);

            if ($re->num_rows > 0) {
             
              while($rowx = mysqli_fetch_array($re)) {
               $po=$rowx['0'];
              }

              $sqlx = "INSERT INTO `payments` (`id`, `customerid`, `amount`, `invoice`, `date_created`) 
            VALUES (NULL, '$po', '$amount', '', '$d')";
            mysqli_query($conn, $sqlx);
            }

            echo '<script>alert("rent went success full")</script>';
            echo "<script>window.location='./rent.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);


      
	  }else{
		 echo '<script>alert("Make sure all field are filled")</script>';
	  }
	  
	  
	  
	  }
	  


?>