
<?php include "admin_nav.php" ?>
<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:Login.php");
}

?>

<br>

<style>
#header {
    padding: 1rem;
    background-color: #0984e3;
    border-radius: 2rem;
    color: white;
    font-weight: bold;
}

</style>
<div class="dash-content">




  <h2 id="header" class="text w3-center">Branch Management System</h2>

<br>

<?php

include "connection.php";

if(isset($_GET['submit'])){




        $name=$_GET['name'];
        $mobile=$_GET['mobile'];
        $address=$_GET['address'];


        $sql="INSERT INTO `branches` VALUES ('','$name','$address','$mobile')";

        $query=mysqli_query($conn, $sql);


             if($query){

              
                echo '
                <br>
                <div class="w3-panel w3-green">
                    <strong>Success!</strong> Data saved successfully!
                </div>
                
                
                ';
          }

          else {
            echo '
    <br>
    <div class="alert alert-danger">
        <strong>Error!</strong>!
    </div>
    
    
    ';
          }

        
      }
       



     
    


?>
<br>
<br>










<form method="get" >
<div class="w3-cell-row">


<div class="w3-container w3-cell w3-mobile">


<label class="w3-textl" for="firstname">Name:</label>
<input type="text" class="w3-input" name="name" id="name" placeholder="Enter your name" required >
<br>


<label class="w3-text" for="firstname">Mobile:</label>
<input type="tel" type="tel" id="phone" name="mobile" class="w3-input"placeholder="Enter mobile number" required>
<br>











</div> 


<div class="w3-container w3-cell w3-mobile">






<label class="w3-text" for="firstname">Address:</label>
<textarea type="text" class="w3-input" name="address" id="address" placeholder="Enter your address" required></textarea>
<br>



</div>
</div>

<input type="submit" name="submit" value="Save Branch Data" class="w3-btn w3-blue">
</form>



           
</div>
   
</body>
</html>
