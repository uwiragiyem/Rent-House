<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>REPORT </title>
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


   <!-- //empt -->


   <div class="card o-hidden border-0  my-5 myp">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row myp" style="padding:0.7cm ;">
                            <div class="col-lg-3 d-none d-lg-block">
                            <div class="card" style="padding:0cm ;">
        <div class="card-header">REPORT </div>
        <div class="card-body">
          <form method="post" id="teacher_login_form">

            

          <div class="form-group">
              <label>REPORT DAY</label>
             
              <input type="date" name="d"  id="" class="form-control" />
              <span id="error_teacher_password" class="text-danger"></span>
            </div><br/>


           

    

            <div class="form-group">
              <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="GET REPORT" />

              
            </div>
          </form>
        </div>
      </div>
                            </div>
                            <div class="col-lg-9 ">
                                <div class="p-5">
                                    <div class="text-left">



                                    

                                    <?php
                    include '../connection.php';

                    @$go=$_POST["submit"];
// @$reg=$_POST["reg"];
@$d=$_POST["d"];


      if(isset($go))
    {

        ?>

        <h5 style="color: whitesmoke">REPORT  </h5>

        <br/>
        <!-- Names: <?php //echo $fname." ".$lname ?> -->

        
        <table class="table" style="width: 100%">
        <td>FIRST NAME</td> <td>LAST NAME</td>  <td>HOUSE NUMBER</td> <td>DATE IN</td>
                        <td>DATE OUT</td> <td>DURATION</td> <td>AMOUNT</td>
        <?php

                    $sql = "select customers.fname,customers.lname,houses.house_no,customers.date_in,customers.date_out,customers.duration,payments.amount from categories,customers,payments,houses,users where
                     customers.h_id=houses.id and houses.category_id=categories.id and customers.id=payments.customerid and users.id=customers.user and date_in='$d' and users.id='$myid';";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
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
                       $sum=$sum+$amount;

                       ?>

                      <tr>
                        <td><?php echo $fname; ?></td> <td><?php echo $lname; ?></td>  <td style='text-align:center'><?php echo $h; ?></td> <td><?php echo $datein; ?></td>
                        <td><?php echo $dateout; ?></td> <td><?php echo $duration; ?></td> <td><?php echo $amount."Rrwf"; ?></td>
                        <!-- <td> <a href="view_applicants.php?id=<?php //echo $row["id"]  ?>"> <input type="submit" name="submit" id="teacher_login" class="btn btn-info col-md-12" value="view" /></i> </a></td> -->
                      </tr>

                       

                       

                       <?php
                      }?>
                      
                      </table>
                      <br/><br/>
                      <h5 style="color: whitesmoke">Total amount eaned is <?php echo $sum; ?></h5>
                      <a href='login.php'>    <button name="login" onclick=print(); type='submit'class="btn btn-info btn-user btn-block" style="margin-top:0.5cm ;">
                                    print
                                </button></a>
                      
                      <?php
                    } else {
                     ?>
                     <div class="card-body" style="background-color: whitesmoke;">
      <h5 class="card-title">there is no customer in at this date </h5>
    </div></div>


<?php
                    }
                }else{

               
                  ?>

                                     <h1 class="h5 text-gray-900 mb-4"><b style="color: whitesmoke">GENERATING DAY REPORT REPORT</b> </h1>
                                    </div>
                                    <p style="color: whitesmoke">
                                       in order to generate report make sure date is correct in order to get report on that day
    

                                    </p>
                                   
                                    <!-- <hr> -->
                                <br/> 
                                    <a href=''>    <button name="login" class="btn btn-primary btn-user btn-block col-md-6">
                                    readmore....
                                </button></a>

<?php
 }

?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>











      </div> 
      <!-- //empt -->
        
</div>

   <!-- //container -->
</div>





  

</body>

</html>
