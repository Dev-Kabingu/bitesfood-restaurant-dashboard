<?php

require_once './includes/html_start.php';
?>

<?php
//linking to access images from the database 
$photos = GetImage($con);
// calling the associative array
$all_images = $photos['images'];


echo'<div class="container">

 <a href="./forms/add_image_menu.php">adding images</a>
 <a href="./forms/add_img_gallery.php">add image to gallery</a>
 <a href="./forms/add_img_testimonial.php">Add Testimonial</a>
 <form action="" method="post" enctype="multipart/form-data">
<table border="1">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Photo</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>';
    if(count($all_images) > 0){
        foreach($all_images as $image){
            echo'<tr>
            <td>'.$image['image_id'].'</td>
            <td>'.$image['image_title'].'</td>
            <td>'.$image['image_description'].'</td>
            <td>'.$image['price'].'</td>
            <td><img src="'.DRL.'photos/'.$image['photo_image'].'" alt=""></td>
            <td><a href="./forms/update_img_menu.php?image_id='.$image['image_id'].'">Update</a></td>
            <td><a href="./forms/remove_img_menu.php?image_id='.$image['image_id'].'&title='.$image['image_title'].'">Delete</a></td>
            </tr>';
        }
    }
    
echo'</table>
</form>
</div>';?>

<?php
 $image = getTestimonial($con);
 $all_testimonial = $image['photos'];
 

 echo '<div class="container">
 <a href="./forms/add_img_testimonial.php">Add Testimonial</a>
 <form action="" method="post" enctype="multipart/form-data">

 <table border="1">
     <tr>
         <th>title</th>
         <th>descriptions</th>
         <th>images</th>
         <th>name</th>
         <th>position<th>
        <th>update</th>
        <th>delete</th>

     </tr>';

     if(count($all_testimonial) > 0){
        foreach($all_testimonial as $testimonial){
           echo ' <tr>
           <td>'.$testimonial['testimonial_title'].'</td>
           <td>'.$testimonial['testimonial_desc'].'</td>
           <td><img src="'.DRL.'testimonial_photos/'.$testimonial['testimonial_image'].'" alt=""</td>
           <td>'.$testimonial['testimonial_name'].'<td>
           <td>'.$testimonial['testimonial_position'].'</td>
           <td>Edit</td>
           <td>Delete</td>
           </tr>';

        }
     }




echo '
    </table>
    </form>
</div>';
?>


 

