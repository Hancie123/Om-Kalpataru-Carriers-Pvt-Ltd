<?php
if(isset($_POST['delete'])){

    include "connection.php";
    
    $id=$_POST['id'];

$sql="DELETE FROM branches WHERE Branch_ID='$id'";

$query=mysqli_query($conn, $sql);

if($query){
    header("Location: dashboard.php");
}
else {
    echo "Error";
}

}

?>