<?php include "nav.php" ?>

<?php 

if(isset($_POST['submit'])){

$email=$_POST['email'];
$password=$_POST['password'];


$sql="SELECT * FROM user WHERE Email='$email' && Password='$password'";

include "connection.php";

$query=mysqli_query($conn, $sql);
  $num_rows=mysqli_num_rows($query);

if($num_rows>0){
    session_start();

$row=mysqli_fetch_array($query);
  
$_SESSION['email']=$email;
$_SESSION['id']=$row['User_ID'];
$_SESSION['name'] =$row['Name'];
$_SESSION['mobile'] =$row['Mobile'];
$_SESSION['email'] =$row['Email'];
$_SESSION['address'] =$row['Address'];
$_SESSION['password'] =$row['Password'];


header("Location: dashboard.php");



}

else{
    echo '
    <br>
    <div class="alert alert-danger">
        <strong>Error!</strong> Incorrect Email and Password!
    </div>
    
    
    ';
  }

}



?>




<br>
<div id="main-wrapper" class="container my-5">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h2 font-weight-bold text-theme text-center">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access admin panel.</p>

                                <form method="post">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-theme">Login</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<style>
.account-block {
  padding: 0;
  background-image: url(Images/login.png);
  background-repeat: no-repeat;
  background-size: cover;
  height: 100%;
  position: relative;
}



.account-block .account-testimonial {
  text-align: center;
  color: #fff;
  position: absolute;
  margin: 0 auto;
  padding: 0 1.75rem;
  bottom: 3rem;
  left: 0;
  right: 0;
}

.text-theme {
  color: #5369f8 !important;
}

.btn-theme {
  background-color: #5369f8;
  border-color: #5369f8;
  color: #fff;
}


</style>

</body>
<?php include "footer.php" ?>
</html>