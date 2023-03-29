<?php
            include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> CUSTOMER</title>
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





        <div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    
                

                <form method="post" id="" style="margin:1cm">

            

          <div class="form-group">
            
              <label>CUSTOMER STATUS</label>
              <br> <br>
             

              <select id="inputState" class="form-select" name="status">
                      <!-- <option selected>Choose...</option> -->

                     
                              
                              <option  value='gone'>GONE</option>
                              <option  value='active'>ACTIVE</option>
                             
                              
                             
                                
                        
                      </select>
            </div><br/>


           

    

            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="SAVE CHANGE " />

              
            </div>
          </form>





                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-left">
                            <h1 class="h5 text-gray-900 mb-4 cx"><b>CUSTOMER INFORMATION</b> </h1>
                        </div>
                        <table style="width: 80%" class='customer_table'>
                     
<?php
 include '../connection.php';

 $sql = "select customers.fname,customers.lname,houses.house_no,customers.date_in,customers.date_out,customers.duration,payments.amount,houses.id,house_status from categories,customers,payments,houses,users where customers.h_id=houses.id and houses.category_id=categories.id and customers.id=payments.customerid and users.id=customers.user and users.id='$myid'";
 $result = $conn->query($sql);
                 
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;

                       $fname=$row["0"];
                       $lname=$row["1"];
                       $h=$row["2"];
                       $datein=$row["3"];
                       $dateout=$row["4"];
                       $duration=$row["5"];
                       $amount=$row["6"];
                       $hid=$row["7"];
                       $s=$row["8"];
                    //    $sum=$sum+$amount;
                      }

                       ?>

                      <tr>
                        <td>FIRST NAME </td> <td><?php echo $fname; ?></td>
                     </tr>
                     
                     <tr>
                        <td>LAST NAME </td> <td><?php echo $lname; ?></td>
                    </tr>

                    <tr>
                        <td>HOUSE NUMBER </td> <td><?php echo $h; ?></td>
                    </tr>

                    <tr>
                        <td>DATE IN </td> <td><?php echo $datein; ?></td>
                    </tr>

                    <tr>
                        <td>DATE OUT </td> <td><?php echo $dateout; ?></td>
                    </tr>

                    <tr>
                        <td>DURATION</td> <td><?php echo $duration; ?></td>
                    </tr>
                    <tr>
                        <td>AMOUNT </td> <td><?php echo $amount; ?></td>
                    </tr>

                    <tr>
                        <td>STATUS </td> <td><?php if($s=='taken'){
                            echo 'still living';
                        } else{
                            echo 'not living';
                        } ?></td>
                    </tr>
                   

                    <tr>
                        <td></td> <td></td>
                    </tr>
                    <br>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>





      </div> 
      <!-- //empt -->

    <!-- //row -->    
</div>

   <!-- //container -->
</div>





  

</body>

</html>


<?php
include '../connection.php';




@$go=$_POST["submit"];
@$cid=$_GET["id"];

echo @$t=$_POST["status"];




      if(isset($go))
    {
	

        //echo '<script>alert("Welcome to Geeks for Geeks")</script>';

          $sql = "UPDATE `customers` SET `status` = '$t' WHERE `customers`.`id` = '$cid'";

          if (mysqli_query($conn, $sql)) {

              
            if($t=='gone')
            {
                 $si = "UPDATE `houses` SET `house_status` = 'untaken' WHERE `houses`.id='$hid'";
            $re = $conn->query($si);
            }else{
                $si = "UPDATE `houses` SET `house_status` = 'taken' WHERE `houses`.id='$hid'";
                $re = $conn->query($si);
            }
           

            echo '<script>alert("Well updated")</script>';
            echo "<script>window.location='./rent.php'</script>";
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }

          mysqli_close($conn);
      
	
	  
	  
	  }
	  


?>
