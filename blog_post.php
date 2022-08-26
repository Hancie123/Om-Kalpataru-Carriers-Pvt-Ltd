<?php include "nav.php" ?>



<?php include_once('connection.php'); ?>

    <div class="container-fluid m-auto mt-3">
        
        <?php
        $post_id=$_GET['id'];
$postQuery="SELECT * FROM blog WHERE Blog_ID=$post_id";
$runPQ=mysqli_query($conn,$postQuery);
$post=mysqli_fetch_assoc($runPQ);
        ?>
            <div class="card mb-3">
           
                <div class="card-body">
                  <h1 class="card-title w3-center"><?=$post['Title']?></h1><br>
                  
                  <br>
                  
                  <div class="container" style="overflow:auto"><?php echo $post['Body'];?></div>
                  <div class="badge bg-primary mb-1">Posted on <?php echo $post['Date'];?></div><br>
                  <div class="badge bg-success text-light">Posted by <?php echo $post['Author'];?></div>
                  


</div>
</div>


</div>

<?php




?>

    
</body>
<?php include "footer.php" ?>
</html>