<?php

require_once '../includes/html_start.php';

if(isset($_GET['image_id'])){

    $image_id=$_GET['image_id'];

    $get_image=getsingleimage($con,$image_id);
    $images=$get_image['images'];

    //retrieve the current image file name
    //0 represent first element of the array
    // var_dump($images);
    $old_image=$images[0]['photo_image'];



echo '
<div class="form_container">
<form method="post" action=" '.updateImage($con).'"  enctype="multipart/form-data">
    <div class="form_group">
        <label for="image">current image</label><br>
        <img src="../photos/'.$images[0]['photo_image'].'" alt="">
    </div>
    <div class="form_group">
        <label for="image">new image</label><br>
        <input type="file" name="new_image" value="new_image">
    </div>
    <div class="form_group">       
        <input type="hidden" name="old_image" value="'.$old_image.'">
    </div>
    <div class="form_group">
        <label for="title">image title</label><br>
        <input type="text" name="image_title" value="'.$images[0]['image_title'].'">
    </div>
    <div class="form_group">
        <label for="desc">image description</label><br>
        <textarea name="desc" id="desc" cols="40" rows="10">'.$images[0]['image_description'].'</textarea>
    </div>
    <div class="form_group">
        <label for="price">price</label><br>
        <input type="number" name="price" value="'.$images[0]['price'].'">
    </div>
    <div class="form_group">       
    <input type="hidden" name="image_id" value="'.$images[0]['image_id'].'">
    </div>
    <div class="form_group">
        <input type="submit" name="updateImage" value="Update Image">
    </div>
</form>
</div>';
}
?>


</body>
</html>


