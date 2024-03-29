<?php

require_once '../includes/html_start.php';
?>


<?php

echo '
<div class="form_container">
<form action=" '.insertTestimonial($con).' " method="post" enctype="multipart/form-data">
    
    <div class="form_group">
        <label for="title">testimonial_title</label><br>
        <input type="text" name="testimonial_title">
    </div>
    <div class="form_group">
        <label for="desc">testimonial</label><br>
        <textarea name="testimonial_desc" id="desc" cols="40" rows="5"></textarea>
    </div>
    <div class="form_group">
        <label for="image">upload image</label><br>
        <input type="file" name="testimonial_image">
    </div>
      
    <div class="form_group">
        <label for="name">name</label><br>
        <input type="text" name="testimonial_name">
    </div>
      
    <div class="form_group">
        <label for="position">position</label><br>
        <input type="text" name="testimonial_position">
    </div>
    
  
    <div class="form_group">
        <input type="submit" name="addTestimonial" id="add" value="add image">
    </div>
</form>
</div>';
?>