<?php
session_start();

include "connection.php";

if(isset($_POST['submit'])){


    if ($_POST["first"] === $_POST["last"]) {


      if(!empty($_POST['first']) && !empty($_POST['last'])){

        $password=$_POST['first'];
        $id=$_SESSION['id'];

        $sql="UPDATE `user` SET  `Password`='$password' WHERE User_ID='$id'";

        $query=mysqli_query($conn, $sql);


             if($query){

              
        header("Location: user_password.php?msg=Passwordischangedsuccessfully");
         $msg = "Success";
          }

          else {
            echo "Errors";
          }

        
      }

      

        else {
        echo "Please fill all the fields!";
      }
       



     }
     else {

        echo "Password does not match";
     }




}

?>

