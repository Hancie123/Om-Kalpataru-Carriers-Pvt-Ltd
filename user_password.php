<?php include "admin_nav.php" ?>
<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:Login.php");
}

?>

<style>

#header {
    padding: 1rem;
    background-color: #0984e3;
    border-radius: 2rem;
    color: white;
    font-weight: bold;
}

#back {
    background-color: #0984e3;
    border-radius: 2rem;
    margin:1rem;
    color:white;

}

#submit {
    background-color:#0984e3;
    color:white;
}
</style>


<div class="dash-content">

<h2 id="header"class="w3-center"> <?php echo $_SESSION['name']; ?>'s Password</h2>
            
<div class="w3-container">           
  <br><br> 
  
  
  <?php

include "connection.php";

if(isset($_POST['submit'])){


    if ($_POST["first"] === $_POST["last"]) {


      if(!empty($_POST['first']) && !empty($_POST['last'])){

        $password=$_POST['first'];
        $id=$_SESSION['id'];

        $sql="UPDATE `user` SET  `Password`='$password' WHERE User_ID='$id'";

        $query=mysqli_query($conn, $sql);


             if($query){

                
                

                header("Location: login.php?msg=Passwordischangedsuccessfully");
          }

          else {
            echo "Errors";
          }

        
      }

      

        else {
            echo '
            <div class="w3-panel w3-red">
<h3>Warning!</h3>
<p>Please fill all the field!</p>
</div> 
            
            
            ';
      }
       



     }
     else {

        echo '
        <div class="w3-panel w3-red">
<h3>Warning!</h3>
<p>Password does not mach!</p>
</div> 
        
        
        ';
     }




}

?>




  <form class="w3-container"  method="post">
    <p>      
    <label class="w3-text-black"><b>New Password</b></label>
    <input class="w3-input w3-border w3-sand w3-round" name="first" type="text"></p>
    <p><br>  
    <label class="w3-text-black"><b>Confirm Password</b></label>
    <input class="w3-input w3-border w3-sand w3-round" name="last" type="text"></p>
    <br>
    <input type="submit" name="submit" id="submit" class="w3-btn w3-center w3-round" value="Change Password">
  </form>           

</div>


</div>

<h4 class="w3-center"><a id="back" href="account.php" type="button" id="back" class="w3-btn">Back</a></h4>

</body>
</html>