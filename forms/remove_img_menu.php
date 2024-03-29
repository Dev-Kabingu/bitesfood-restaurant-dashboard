<?php

require_once '../includes/html_start.php';

if(isset($_GET['image_id'])){

    $image_id=$_GET['image_id'];
    $img=$_GET['title'];//gets title of image to be deleted


    



echo '
<div class="form_container">
<h2>Are you sure you want to delete:'.$img.'</h2>
<form method="post" action=" '.deleteImage($con).'"  enctype="multipart/form-data">
  
    <div class="form_group">       
        <input type="hidden" name="image_title" value="'.$image_id.'">
    </div>

    <div class="form_group">
        <input type="submit" name="deleteImage" value="Delete Image">
    </div>
</form>
</div>';
}
?>


</body>
</html>


