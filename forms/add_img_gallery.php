<?php

require_once '../includes/html_start.php';
?>


<?php

echo '<div class="form_container">

<form action="'.insertgalleyimg($con).'" method="post" enctype="multipart/form-data">

<div class="form_group">
    <label>upload image</label>
    <input type="file" name="image_photo">
</div>
<div class="form_group">
    <input type="submit" name="add_image">
</div>
</form>
</div>';
?>

<!-- <form action="" enctype="multipart/form-data"></form> -->
<!-- '.DRL.'testimonial_photos/'.$testimonial['testimonial_image'].' -->