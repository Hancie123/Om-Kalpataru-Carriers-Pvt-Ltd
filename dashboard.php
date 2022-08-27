
<?php include "admin_nav.php" ?>
<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:login");
}

?>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                    <i class='bx bx-user'></i>
                        <span class="text">Total Users</span>
                        <span class="number"><?php 
    include "connection.php";   
    $query = "SELECT COUNT(User_ID) as ID FROM user";
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
     while ($row = mysqli_fetch_array($result)) {
      echo "<h1> $row[0] </h1>";
      }
      ?></span>
                    </div>
                    <div class="box box2">
                    <i class='bx bxl-periscope'></i>
                        <span class="text">Branches</span>
                        <span class="number"><?php 
    include "connection.php";   
    $query = "SELECT COUNT(Branch_ID) as ID FROM branches";
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
     while ($row = mysqli_fetch_array($result)) {
      echo "<h1> $row[0] </h1>";
      }
      ?></span>
                    </div>
                    <div class="box box3">
                    <i class='bx bx-user'></i>
                        <span class="text">Current User</span>
                        <span class="number"><?php echo $_SESSION['name']; ?></span>
                    </div>
                </div>
            </div>

<div class="activity">
<div class="title">
<i class="uil uil-clock-three"></i>
<span class="text">Branches</span>
</div>

              
<table id="hancie"class="w3-table">
<thead class="w3-green text-light">
<tr>
<th>ID</th>
<th>Incharge Name</th>
<th>Branch</th>
<th>Address</th>
<th>Delete</th>
<th>Edit</th>

</tr>
</thead>
<?php
include "connection.php";

$sql="SELECT * from branches";

$query=mysqli_query($conn, $sql);

while ($row=mysqli_fetch_array($query)) {
?>

<tr>
  <td> <?php echo $row['Branch_ID']?></td>
  <td> <?php echo $row['Name']?></td>
  <td> <?php echo $row['Mobile']?></td>
  <td> <?php echo $row['Address']?></td>
  
  
<th>
<div class="input-group">
<form action="function_branch.php" method="post">
<input type="hidden" value="<?php echo $row['Branch_ID']; ?> " name="id">
<input type="submit"  name="delete" value="Delete" class="w3-btn w3-red">
</form>
</div>
</th>

<th>
<div class="input-group">
<form action="function_branch.php" method="post">
<input type="hidden" value="<?php echo $row['Branch_ID']; ?> " name="id">
<input type="submit"  name="delete" value="Edit" class="w3-btn w3-red">
</form>
</div>
</th>




<?php  
}
?>

</table>
                
        </div>
    </section>

   
</body>
</html>
