<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
         <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap/js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
       <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>myDiary</title>
    </head>
    <body>
        
        <div class="container border">

<?php include './header.php'; ?>
           
            <div class="row">
                <div class="col-md-2 min-height">
                  <?php
                   include './navbar.php';
                   ?>
                
                </div>
                    
                
                <div class="col-md-10 border min-height">
                    
                    <?php
                    $con = new mysqli("ap-cdbr-azure-east-c.cloudapp.net", "b1236d751c9714", "41e55854", "acsm_dd5dc4ba52b59d7");
                            if(mysqli_errno($con))
                            {
                                die(mysqli_error($con)." error connectiion failed.");
                            }
                            
                            $sql = "select * from diary";
                            $result = $con->query($sql);
                            $con->close();
                            if(mysqli_num_rows($result)>0)
                            {                                
                                while($diary = mysqli_fetch_array($result))
                                {
                                    ?>
                                        <div class = "row margin-top">
                        <div class="col-md-6">
                            <label>Entry Title:</label> <?php echo $diary['diary_name']; ?>
                        </div>
                        
                    </div>
                    
                      <div class = "row margin-top">
                          <div class="col-md-6">
                              <label>Category</label> <?php echo $diary['diary_category']; ?>
                        </div>
                        
                    </div>
                    
                      <div class = "row margin-top">
                          <div class="col-md-12">
                              <label> Entry Summary</label><br>
                              <?php echo $diary['diary_summary']; ?>
                        </div>
                        
                    </div>
                    
                    <hr>
                    
                    
                    <?php
                                }
                            }
                            
                            
                    ?>
                    

                    
                </div>
            </div>
            
            <div class="row">
            
                <div class="col-md-12 border footer">
                    Designed by Shahid Baig, 2016
                    
                </div>
                
        </div>

            </div>

    </body>
</html>

