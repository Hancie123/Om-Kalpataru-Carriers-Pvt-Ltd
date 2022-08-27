<?php include "nav.php"?>

    
</body>


<?php

include "connection.php";

if(isset($_GET['submit'])){




        $name=$_GET['name'];
        $email=$_GET['email'];
        $mobile=$_GET['mobile'];
        $message=$_GET['message'];

        $sql="INSERT INTO `contact` VALUES ('','$name','$email','$mobile','$message')";

        $query=mysqli_query($conn, $sql);


             if($query){

              
        
        echo '
        <br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Message is send successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        
        ';
          }

          else {
            echo "Errors";
          }

        
      }



?>

<div class="container mt-4 mb-4">
            <h1 class="text-center">GET IN TOUCH WITH US</h1>
            <hr>
            <form id="contactForm-1"  method="get">
                <div class="row">
                    <div class="col-md-6">
                        <div id="successfail-1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6" id="message-1">
                        <h2 class="h2"> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small></h2>
                        <div class="form-group mb-3"><label class="form-label" for="from-name">Name</label><span class="required-input">*</span>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-user-o"></i></span><input class="form-control" type="text" id="from-name-1" name="name" required="" placeholder="Full Name"></div>
                        </div>
                        <div class="form-group mb-3"><label class="form-label" for="from-email">Email</label><span class="required-input">*</span>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span><input class="form-control" type="text" id="from-email-1" name="email" required="" placeholder="Email Address"></div>
                        </div>

                        <div class="form-group mb-3"><label class="form-label" for="from-email">Phone</label><span class="required-input">*</span>
                            <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span><input class="form-control" type="text" id="from-email-1" name="mobile" required="" placeholder="Mobile Number"></div>
                        </div>
                        
                            
                            
                        <div class="form-group mb-3"><label class="form-label" for="from-comments">Message</label><textarea class="form-control" id="from-comments-1" name="message" placeholder="Enter messages" rows="5"></textarea></div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col"><button class="btn btn-primary d-block w-100" type="reset"><i class='bx bx-reset' ></i> Reset</button></div>
                                <div class="col"><input class="btn btn-primary d-block w-100" type="submit" name="submit" value="Submit"></div>
                            </div>
                        </div>
                        </form>
                        <hr class="d-flex d-md-none">
                    </div>
                    <div class="col-12 col-md-6">
                        <h2 class="h4"><i class='bx bxs-location-plus'></i> Locate Us</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="static-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2457.883750410598!2d84.86972939335409!3d27.011600643220024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2snp!4v1661351067706!5m2!1sen!2snp" width="650" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class="bi bi-info-circle"></i> Our Info</h2>
                                <div><span><strong>Founder: Mahesh Hamal</strong></span></div>
                                <div><span>Email: hamal.mahesh45@gmail.com</span></div>
                                <div><span>Website: Omkalpatarucarriers.com.np</span></div>
                                <hr class="d-sm-none d-md-block d-lg-none">
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <h2 class="h4"><i class='bx bx-current-location'></i> Our Address</h2>
                                <div><span><strong>Head Office: Adarshanagar, Birgunj</strong></span></div>
                                <div><span>Found and Managing Director: Om Chaudary</span></div>
                                <div><span>Mobile No: 9845257819</span></div>
                                
                                <hr class="d-sm-none">
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        


<style>
#contactForm .h4 {
  font-weight: 400;
  border-bottom: 1px solid silver;
}

.required-input {
  color: maroon;
}

.static-map {
  margin-bottom: 20px;
}

@media (max-width: 768px) and (min-width: 767px) {
  #contactForm .static-map img {
    width: 100%;
  }
}

</style>





<?php include "footer.php" ?>
</html>