<?php include "nav.php" ?>
    
<h1 class="text-center p-3">Our Branches</h1>

<div class="container">

<table id="hancie"class="table table-striped table-hover">
<thead class="bg-success text-light">
<tr>
<th>ID</th>
<th>Incharge Name</th>
<th>Branch</th>
<th>Caontact No</th>

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
  <td> <?php echo $row['Address']?></td>
  <td> <?php echo $row['Mobile']?></td>
  

<?php  
}
?>

</table>
</div>

<br>
<script>
  $(document).ready(function () {
    $('#hancie').DataTable();
});

  </script>

 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</body>
<?php include "footer.php" ?>
</html>