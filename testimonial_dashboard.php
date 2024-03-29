<?php

require_once './includes/html_start.php';
?>




<div class="container">
<a href="./forms/add_image_menu.php">adding images</a>
<a href="./forms/add_img_testimonial.php">Add Testimonial</a>
<form action="" method="post" enctype="multipart/form-data">
<table  border="1">
   <thead>
   <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">image</th>
        <th scope="col">name</th>
        <th scope="col">position</th>
        <th scope="col">operations</th>
       
    </tr>
   </thead>
    <tbody>

    <?php
    
    $sql = "SELECT * FROM testimonials";
    $result = mysqli_query($con,$sql);

    if($result){

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['testimonial_id'];
            $title = $row['testimonial_title'];
            $description = $row['testimonial_desc'];
            $image = $row['testimonial_image'];
            $name =$row['testimonial_name'];
            $position = $row['testimonial_position'];

            echo ' <tr>
            <th scope="row">'.$id.'</th>
            <td>'.$title.'</td>
            <td>'.$description.'</td>
            <td><img src="./testimonial_photos/'.$image.'" alt=""></td>
            <td>'.$name.'</td>
            <td>'.$position.'</td>
            <td>update</td>
            <td>delete</td>
        </tr>';

        }
    }

    ?>
       
    </tbody>

