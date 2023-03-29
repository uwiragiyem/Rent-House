<?php
             include '../connection.php';     
                   $id= $_GET['id'];


                    $my_qxx ="select houses.id from houses,categories  WHERE categories.id=houses.category_id and houses.category_id='$id'";
                        $res= $conn->query($my_qxx);

                        while($rowx = mysqli_fetch_array($res)) {

                          echo $hid=$rowx['0'];
                       
                         }

                          $my_qz ="select id from customers  WHERE h_id='$hid'";
                        $resz= $conn->query($my_qz);

                        while($rowz = mysqli_fetch_array($resz)) {

                          echo $cid=$rowz['0'];
                       
                         }

                   
                 
                  
                 
                    
                  
                      $my_q ="delete from categories  WHERE `id` ='$id'";
                      $results= $conn->query($my_q);
                      if ($results) {

                        $my_q ="delete from houses  WHERE `id` ='$hid'";
                        $results= $conn->query($my_q);


                        $my_qx ="delete from customers WHERE `id` ='$cid'";
                        $results= $conn->query($my_qx);

                        $my_qx ="delete from payments WHERE `customerid` ='$cid'";
                        $results= $conn->query($my_qx);


                        // $my_q3 ="update  project set team_id='unsigned', 
                        // status='unsigned',start_date='not yet',end_date='not yet' where team_id='$team_id'";
                        // $results= $conn->query($my_q3);


                        echo '<script>alert("Well deleted")</script>';
                        echo "<script>window.location='./categories.php'</script>";
                  
                        
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                  
                      mysqli_close($conn);
                  
                                      ?>