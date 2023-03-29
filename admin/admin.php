<?php
            include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> DASHBOARD </title>
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
          
      


        <div class="row statistics">
        <div class="col-md-4 x">
        <center><h3 style="margin-top:1cm">NUMBER OF HOUSES<br/>
    
                   <?php

include '../connection.php';

$sql = "SELECT count(id)	FROM houses";
$result = $conn->query($sql);


while($row = mysqli_fetch_array($result)) {
 $c=$row['0'];
}
echo $c;
 ?>
 
</h3></center>
    
          </div>

 




          <div class="col-md-4 x" >
        <center><h3 style="margin-top:1cm">NUMBER OF HOUSE CATEGORY<br/>

        <?php

include '../connection.php';

$sql = "SELECT count(id)	FROM categories";
$result = $conn->query($sql);


while($row = mysqli_fetch_array($result)) {
 $c=$row['0'];
}
echo $c;
 ?>
 
    
          
    
</h3></center>
    
          </div>


          <div class="col-md-4 x">
        <center><h3 style="margin-top:1cm">NUMBER OF UNTAKEN HOUSES<br/>


        <?php

include '../connection.php';

$sql = "SELECT count(id)	FROM houses where house_status='untaken'";
$result = $conn->query($sql);


while($row = mysqli_fetch_array($result)) {
 $c=$row['0'];
}
echo $c;
 ?>
 
    
          

</h3></center>
    
          </div>




          
          
          <div class="col-md-4 x">
        <center><h3 style="margin-top:1cm">NUMBER OF TAKEN HOUSES<br/>


        <?php

include '../connection.php';

$sql = "SELECT count(id)	FROM houses where house_status='taken'";
$result = $conn->query($sql);


while($row = mysqli_fetch_array($result)) {
 $c=$row['0'];
}
echo $c;
 ?>
 
    
          

</h3></center>
    
          </div>



          <div class="col-md-4 x">
        <center><h3 style="margin-top:1cm">NUMBER OF USERS<br/>


        <?php

include '../connection.php';

$sql = "SELECT count(id)	FROM users where type!='admin'";
$result = $conn->query($sql);


while($row = mysqli_fetch_array($result)) {
 $c=$row['0'];
}
echo $c;
 ?>
 
    
          

</h3></center>
    
          </div>



          <div class="col-md-4 x">
        <center><h3 style="margin-top:1cm">TOTAL AMOUNT RECEIVED<br/>

        <?php

include '../connection.php';

$sql = "select COUNT(customers.id),payments.amount from categories,customers,payments,houses,users where
customers.h_id=houses.id and houses.category_id=categories.id and customers.id=payments.customerid and users.id=customers.user";
$result = $conn->query($sql);
$sum=0;


while($row = mysqli_fetch_array($result)) {
//  $c=$row['0'];
 $a=$row['1'];
 $sum=$sum+$a;
}
echo $sum;
 ?>
 
    
          
 
</h3></center>
    
          </div>

          <!-- <div class="col-md-4"></div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div> -->
        </div>
      
      
      
      
      
      
      </div>
        <!-- <div class="col-md-12">  </div> -->
  
    </div>
</div>







  

</body>

</html>