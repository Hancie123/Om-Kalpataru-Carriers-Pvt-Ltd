<?php include "admin_nav.php" ?>

<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:login.php");
}

?>
<style>

a{
    text-decoration: none;
}

.h720 {
    font-size:1.55rem;
    padding: 2rem;
}

</style>


<div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Account</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                    <i class='bx bx-user bx-lg'></i>
                        <a href="view_account.php" class="h720">View My Account</a>
                    </div>
                    <div class="box box2">
                    <i class='bx bxs-key bx-lg'></i>
                        <a href="user_password.php" class="h720">Change Password</a>
                    </div>
                    <div class="box box3">
                    <i class='bx bxs-user-plus bx-lg'></i>
                        <a href="#" class="h720">Create an Account</a>
                    </div>
                </div>
            </div>


</body>
<?php include "admin_footer.php" ?>
</html>