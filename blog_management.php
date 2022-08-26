<script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
<?php include "admin_nav.php" ?>
<?php 

session_start();
if(!isset($_SESSION['email'])){
header("Location:Login.php");
}

?>

<style>
#header {
    padding: 1rem;
    background-color: #0984e3;
    border-radius: 2rem;
    color: white;
    font-weight: bold;
}

#submit {
    background-color: #0984e3;
    border-radius: 2rem;
    margin:1rem;
    color:white;

}

</style>
<div class="dash-content">

<h1 id="header" class="w3-center">Blog Management System</h1>
<br>
<div class="w3-container">

<form action="function_blog.php" method="post">

<div class="w3-cell-row">


<div class="w3-container  w3-cell w3-mobile">
    
<label for="title" class="w3-text">Title:</label>
<input type="text" class="w3-input w3-border w3-round" id="title" placeholder="Enter blog title" name="title" required>
<br>

<!-- Column Close -->
</div>

<div class="w3-container  w3-cell w3-mobile">

<label for="title" class="w3-text">Author:</label>
<input type="text" class="w3-input w3-border w3-round" id="author" placeholder="Enter Author Name" name="author" required>

<!-- Column Close -->
</div>

<!-- Row Close -->
</div>

<label for="title" class="w3-text">Description:</label>
<textarea  class="w3-input w3-border w3-round" id="title" placeholder="Enter blog description" name="description"></textarea>
<br>

<textarea class="w3-input w3-border w3-round" id="editor" name="editor"></textarea>
<br>
<input type="submit" id="submit" name="submit" value="Publish Announcement" class="w3-btn">
</form>
<br>
<!-- Container Close -->
</div>
<!-- dash-content close -->
</div>

<script>
CKEDITOR.replace('editor');
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</body>
</html>