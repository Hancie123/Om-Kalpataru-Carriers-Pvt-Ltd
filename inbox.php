

<?php include "admin_nav.php" ?>
<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:Login.php");
}

?>

<style>

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

#tableHeader {

    background-color:green;
    color:white;

}


</style>

<?php
if(isset($_POST['delete'])){

$id=$_POST['id'];


include "connection.php";

$sql="DELETE FROM contact WHERE Contact_ID='$id'";

$query=mysqli_query($conn, $sql);

if($query){
    
    
    header("Location:inbox.php");
}

else {
    echo "error";
}

}


?>

<div  class="dash-content">

<div   class="w3-container">
  <h2 id="header" class="w3-center w3-round">Inbox Messages</h2>
</div>

<br>
<div class="container">

<table  id="hancie" class="w3-table w3-hoverable w3-bordered w3-centered">
<thead id="tableHeader">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Message</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php
include "connection.php";

$sql="SELECT * from contact ORDER BY Contact_ID DESC";

$query=mysqli_query($conn, $sql);

while ($row=mysqli_fetch_array($query)) {
?>

<tr>
  <td> <?php echo $row['Contact_ID']?></td>
  <td> <?php echo $row['Name']?></td>
  <td> <?php echo $row['Email']?></td>
  <td> <?php echo $row['Mobile']?></td>
  <td> <?php echo $row['Message']?></td>
  
  <td>

  <div class="input-group">
<form  method="post">
<input type="hidden" value="<?php echo $row['Contact_ID']; ?> " name="id">
<button name="delete" class="w3-btn w3-red w3-round"><i class='bx bxs-message-square-x bx-sm'></i></a> 
</form>
</div>

</td>
</tbody>
<?php  
}
?>

</table>
</div>


</div>






</body>
</html>