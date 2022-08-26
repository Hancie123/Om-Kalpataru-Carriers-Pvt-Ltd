<?php include "admin_nav.php" ?>
<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:Login.php");
}

?>

<style>
hr.style-eight {
    overflow: visible; /* For IE */
    padding: 0;
    border: none;
    border-top: medium double #333;
    color: #333;
    text-align: center;
}
hr.style-eight:after {
    content: "ॐ";
    display: inline-block;
    position: relative;
    top: -0.7em;
    font-size: 1.5em;
    padding: 0 0.25em;
    background: white;
}

#back {
    border-radius: 1rem;
}

#header {
    padding: 1rem;
    background-color: #0984e3;
    border-radius: 2rem;
    color: white;
    font-weight: bold;
}




</style>

<div  class="dash-content">
<?php

    include "connection.php";
    $id=$_SESSION['id'];
    
    $sql="SELECT * FROM user WHERE User_ID='$id'";
    
    $query=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)){
       ?>




<div   class="w3-container bg-success text-light">
  <h2 id="header" class="w3-center w3-round"><?php echo $_SESSION['name'];?> Account Details</h2>
</div>
<br>
<div class="w3-container">
<h3 class="form-label" for="name">Registration ID: <span><?php echo $row['0'];?></span> </h3>
    </div>
<hr class="style-eight">

<div class="w3-cell-row">

<div class="w3-container w3-cell w3-mobile">


<h3 class="form-label" for="name">Name: <span><?php echo $row['1'];?></span> </h3>

<br>
<h3 class="form-label" for="name">Email: <span><?php echo $row['2'];?></span> </h3>
<br>

<h3 class="form-label" for="name">Mobile: <span><?php echo $row['3'];?></span> </h3>
<br>

</div>

<div class="w3-container w3-cell w3-mobile">

<h3 class="form-label" for="name">Password: <span><?php echo $row['4'];?></span> </h3> 
<br>
<h3 class="form-label" for="name">Address: <span><?php echo $row['5'];?></span> </h3>
<br>


</div>
</div>

<br>
						
 



    </div>
    
<?php
    }


?>




</div>

<h4  class="w3-center"><a id="back" href="account.php" class="w3-btn w3-blue">Back</a></h4>

</body>

</html>