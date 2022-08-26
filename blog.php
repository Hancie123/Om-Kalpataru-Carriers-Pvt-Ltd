<?php
require('connection.php');


if(isset($_GET['page'])){
  $page=$_GET['page'];
}else{
  $page=1;
}
$post_per_page=4;
$result=($page-1)*$post_per_page;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Om Kalpataru Carriers Pvt.Ltd</title>
    <link rel="icon" href="Images/logo.png">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</head>
<body>
<style>
a {
    text-decoration:none;
}

#nav {
    background-color: #3498db ;
    
}

#navlink {
    font-weight: bold;
    color:black;
}

#navlink:hover {
    background-color:green;
    color:white;
}

</style>

<!-- Upper Nav -->

<div class="w3-panel w3-red p-0 m-0">
<div class="m-0 p-1 mx-2" >   
<a href="tel: 9855023540" class="text-light mx-2"><i class="bi bi-telephone"></i> 9855023540</a>
<a href="mailto: omkalpataru.brj@gmail.com" class="text-light"><i class="bi bi-envelope"></i> omkalpataru.brj@gmail.com</a>
<a href="login" class="text-light w3-right hover-overlay"><i class='bx bx-log-in-circle'></i> Login</a>
</div>
</div>

<!-- Navigation Bar -->
<nav id="nav" class="navbar navbar-expand-sm navbar-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="https://omkalpatarucarriers.com.np/">
      <img src="Images/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill w3-left w3-margin-left"> 
    </a>

    <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
    <i class='bx bx-menu bx-md bx-burst'></i>
    </button>
    <div class="collapse navbar-collapse text-center" id="collapsibleNavbar">
      <ul class="navbar-nav mx-3">
        <li class="nav-item">
          <a id="navlink" class="nav-link" href="https://omkalpatarucarriers.com.np/">Home</a>
        </li>
        <li class="nav-item">
          <a id="navlink" class="nav-link" href="branches">Branch</a>
        </li>
        <li class="nav-item">
          <a id="navlink" class="nav-link" href="staff">Staffs</a>
        </li> 
        <li class="nav-item">
          <a id="navlink" class="nav-link" href="blog">Blogs</a>
        </li>  

        <li class="nav-item">
          <a id="navlink" class="nav-link" href="about">About</a>
        </li> 

        <li class="nav-item">
          <a id="navlink" class="nav-link" href="contact">Contact</a>
        </li>        
      </ul>
    </div>
    <form class="d-flex w3-right"> 
    <input type="search" class="form-control rounded" placeholder="Search" name="search" aria-label="Search" aria-describedby="search-addon" />
    <button type="submit" class="btn btn-warning">search</button>
  </form>

  </div>
</nav>

  

 

<div  id="HancieCarousal" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="Images/Slider1.jpg" style="width: 100%; height: 50vh;" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>Blog</h1>
        <p>Read announcement and blog</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="Images/Slider3.jpg" style="width: 100%; height: 50vh;" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h1>Blog</h1>
        <p>Read announcement and blog</p>
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="Images/Slider2.jpg" style="width: 100%; height: 50vh;" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h1>Blog</h1>
        <p>Read announcement and blog</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#HancieCarousal" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#HancieCarousal" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>         
  


<?php 
                  include "connection.php";

                  
                  if(isset($_GET['search'])){
                    $keyword = $_GET['search'];
                    $postQuery="SELECT * FROM blog WHERE Title LIKE '%$keyword%' OR Body LIKE '%$keyword%' OR Description LIKE '%$keyword%' ORDER BY Blog_ID DESC LIMIT $result,$post_per_page";
                  }else{
                   $postQuery="SELECT * FROM blog ORDER BY Blog_ID DESC LIMIT $result,$post_per_page";
                  }
                 
                  $runPQ=mysqli_query($conn,$postQuery);
                  while($row=mysqli_fetch_array($runPQ)){
                    ?>
</br>

<a href="blog_post?id=<?=$row['Blog_ID']?>" style="text-decoration:none;color:black">
<div class="container">
<div class="card">
  <div class="card-header bg-success text-light h5">
  <?php echo $row[1];?>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $row[3];?></p>
    <p class="card-text"><small class="text-muted">Posted: <?php echo $row[4];?></small></p><br>
    <a href="blog_post.php?id=<?=$row['Blog_ID']?>" class="btn btn-primary">Read More</a>
  </div>
</div>
                  </a>
                  </div>
              
<?php




                    

                  }
                
?>
<br>
<?php
if(isset($_GET['search'])){
  $keyword=$_GET['search'];
$q="SELECT * FROM blog WHERE Title LIKE '%$keyword%'";

}else{
  $q="SELECT * FROM blog";

}
$r=mysqli_query($conn,$q);
$total_posts=mysqli_num_rows($r);
$total_pages=ceil($total_posts/$post_per_page);

?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php
if($page>1){
  $switch="";
}else{
  $switch="disabled";
}
if($page<$total_pages){
  $nswitch="";
}else{
  $nswitch="disabled";
}
        ?>
          <li class="page-item <?=$switch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php
for($opage=1;$opage<=$total_pages;$opage++){
  ?>
          <li class="page-item"><a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$opage?>"><?=$opage?></a></li>

  <?php
}
          ?>
          
          <li class="page-item <?=$nswitch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page+1?>">Next</a>
          </li>
        </ul>
      </nav>

    



</body>
<?php include "footer.php" ?>
</html>