<?php
$message = "";
if(isset($_POST['save_diary']))
{
    $name = $_POST['diary_name'];
    $summary = $_POST['diary_summary'];
    $category = $_POST['diary_category'];

    
    $con = new mysqli("ap-cdbr-azure-east-c.cloudapp.net", "b1236d751c9714", "41e55854", "acsm_dd5dc4ba52b59d7");
    
    if(mysqli_errno($con))
    {
        die(mysqli_errno($con)." Failed to connect database.");
    }
    
    $sql = "insert into diary (diary_name, diary_summary, diary_category)values('$name','$summary','$category')";
    
    $con->query($sql);
    $con->close();
    $message = "<h3>Data saved successfully</h3>";
    
}//end if statement

?>
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
                    
                <form action="" method="POST">           
                <div class="col-md-10 border min-height">
                    
                    <div class = "row" style="margin-top: 10px;">
                        <div class="col-md-3">Entry Title</div>
                        <div class="col-md-9"> <input name="diary_name" type="text" class="form-control" required=""> </div>
                    </div>


                    
                      <div class = "row" style="margin-top:10px;">
                        <div class="col-md-3">Entry Summary</div>
                        <div class="col-md-9"> <textarea name="diary_summary" class="form-control" required=""></textarea> </div>
                    </div>


                    
                      <div class = "row" style="margin-top: 10px;">
                        <div class="col-md-3">Category</div>
                        <div class="col-md-9"> <input name="diary_category" type="text" class="form-control" required=""></div>
                    </div>



                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-2" style="float:right;">
                            <input type="submit" name="save_diary" value="Submit" class="form-control">
                            
                        </div>
                        
                    </div>
                     <?php echo $message; ?>
                </div>
                
            </form>
              
               
                
                
                
            </div>
            
            <div class="row">
            
                <div class="col-md-12 border footer">
                    Designed by Shahid Baig, 2016
                    
                </div>
                
        </div>

            </div>
        
               
            
        
        
        
    </body>
</html>

