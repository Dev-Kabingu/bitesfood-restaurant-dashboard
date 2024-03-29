<?php

require_once '../includes/html_start.php';
?>
    
<?php

echo '<div class="form_container">
<form action=" '.InsertImage($con).'" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="image">upload image</label><br>
        <input type="file" name="photo_image">
    </div>
    <div class="form_group">
        <label for="title">image title</label><br>
        <input type="text" name="image_title">
    </div>
    <div class="form_group">
        <label for="desc">image description</label><br>
        <textarea name="desc" id="desc" cols="40" rows="5"></textarea>
    </div>
    <div class="form_group">
        <label for="price">price</label><br>
        <input type="text" name="price">
    </div>
    <div class="form_group">
        <input type="submit" name="addimage" id="add" value="add image">
    </div>
</form>
</div>';
?>


</body>
</html>


