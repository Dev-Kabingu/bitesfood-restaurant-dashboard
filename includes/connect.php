<?php

// $con = mysqli_connect('localhost', 'root', '', 'bitesfood');
$con = mysqli_connect('sql101.ezyro.com', 'ezyro_36261176', '97e0537408b35a65', 'ezyro_36261176_bitesfood');

function InsertImage($con)
{

    if (isset($_POST['addimage'])) {
        // retrive title, decription and price
        $image_title = $_POST['image_title'];
        $image_description = htmlentities($_POST['desc']);
        $price = $_POST['price'];

        // access name and temporaly location of image
        $image_name = $_FILES['photo_image']['name'];

        $image_tmp = $_FILES['photo_image']['tmp_name'];
        //generating a unique id for the image
        $rename_image = uniqid() . $image_name;
        // storing the image in the photo folder when they are fectched from the database
        $directory = "../photos/" . $rename_image;
        move_uploaded_file($image_tmp, $directory);

        // sql insertion statement
        $statement = "INSERT INTO menu(image_title,image_description,price,photo_image)
                     VALUES('$image_title','$image_description','$price','$rename_image')";

        //  execute the sql statement
        $result = mysqli_query($con, $statement);
        if ($result) {
            // open the menu page
            header("location: ../index.php");
            //stop function execution
            exit();
        }
    }
}


// getting image from the database

function GetImage($con)
{
    // sql statement to retrieve the image and its details from the database
    $statement = "SELECT * FROM menu ORDER BY image_id";
    //    execute the sql statement
    $result = mysqli_query($con, $statement);

    // check if there are rows returned 
    if (mysqli_num_rows($result) > 0) {
        // initialize an empty array
        $photos = [];

        // iterate throught each row fetched from the database
        while ($row = mysqli_fetch_assoc($result)) {
            // create an associative array

            $photos[] = [
                'image_id' => $row['image_id'],
                'image_title' => $row['image_title'],
                'image_description' => $row['image_description'],
                'price' => $row['price'],
                'photo_image' => $row['photo_image']
            ];
        }
        //return the associative array containing the details
        return [
            'images' => $photos,
        ];
    }
}



// updating the images code

function getsingleimage($con, $image_id)
{
    $statement = "SELECT * FROM menu WHERE image_id='$image_id'";
    $result = mysqli_query($con, $statement);

    if (mysqli_num_rows($result) > 0) {
        $image = [];

        while ($row = mysqli_fetch_assoc($result)) {

            $image[] = [

                'image_id' => $row['image_id'],
                'image_title' => $row['image_title'],
                'image_description' => $row['image_description'],
                'price' => $row['price'],
                'photo_image' => $row['photo_image'],
            ];
        }

        return [
            'images' => $image
        ];
    }
}

function updateImage($con)
{

    if (isset($_POST['updateImage'])) {

        $image_id = $_POST['image_id'];
        $image_title = $_POST['image_title'];
        $image_description = htmlentities($_POST['desc']);
        $price = $_POST['price'];

        $new_image = $_FILES['new_image']['name'];
        $old_image = $_POST['old_image'];

        if (!empty($new_image)) {
            $rename = uniqid() . $new_image;
            $temp_image = $_FILES['new_image']['tmp_name'];

            $directory = "../photos/" . $rename;

            $statement = "UPDATE menu SET image_id='$image_id',image_title='$image_title',
            image_description='$image_description',price='$price',photo_image='$rename'
            WHERE image_id='$image_id'";
        } else {
            $statement = "UPDATE menu SET image_id='$image_id',image_title='$image_title',
            image_description='$image_description',price='$price',photo_image='$old_image'
            WHERE image_id='$image_id'";
        }

        $result = mysqli_query($con, $statement);

        // if($result === false){
        //     echo "Error updating image:".mysqli_error($con);
        //     return false;
        // }else{
        //     return true;
        // }

        if ($result) {
            if (!empty($new_image)) {
                move_uploaded_file($temp_image, $directory);
            }
            //show the id of object to be updated
            header("Location: ../index.php?image_id=$image_id");
        } else {
            echo 'Error';
        }
    }
}



// deleting images from the database and also the dashboard and also the folder photo

function deleteImage($con)
{
    if (isset($_POST['deleteImage'])) {

        $image_id = $_POST['image_title'];
        // $image_title=$_POST['image_title'];

        $statement = "DELETE FROM menu WHERE image_id='$image_id'";

        $result = mysqli_query($con, $statement);
        if ($result) {
            echo 'image delete';
            header("Location:../index.php");
        }
    }
    
    
}

// adding testimonials into the database

function insertTestimonial($con)
{

    if (isset($_POST['addTestimonial'])) {

        $testimonial_title = $_POST['testimonial_title'];
        $testimonial_desc = $_POST['testimonial_desc'];
        $testimonial_name = $_POST['testimonial_name'];
        $testimonial_position = $_POST['testimonial_position'];

        $testimonial_image = $_FILES['testimonial_image']['name'];
        $temp_image = $_FILES['testimonial_image']['tmp_name'];

        $rename_image = uniqid() . $testimonial_image;
        $directory = "../testimonial_photos/" . $rename_image;
        move_uploaded_file($temp_image, $directory);

        $sql = "INSERT INTO testimonials(testimonial_title, testimonial_desc, testimonial_image, testimonial_name, testimonial_position)
        VALUES ('$testimonial_title','$testimonial_desc','$rename_image','$testimonial_name','$testimonial_position')";


        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location: ../index.php");
            exit();
        }
       
    }
}

// Retrive the testimonials from the database and display them

function getTestimonial($con)
{
    //sql statement to retrive the data
    $sql = "SELECT * FROM testimonials ORDER BY testimonial_id";
    //execute the sql
    $result = mysqli_query($con, $sql);
    //check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        //initialize an empty array
        $images = [];
        //iterate through the rows
        while ($row = mysqli_fetch_assoc($result)) {
            //creat  an associative array
            $images[] = [
                'testimonial_id' => $row['testimonial_id'],
                'testimonial_title' => $row['testimonial_title'],
                'testimonial_desc' => $row['testimonial_desc'],
                'testimonial_image' => $row['testimonial_image'],
                'testimonial_name' => $row['testimonial_name'],
                'testimonial_position' => $row['testimonial_position'],
            ];
        }
        return [
            'photos' => $images
        ];
    }
}


//inserting images to the database that are to be displayed on the gallery page

function insertgalleyimg($con){

    if(isset($_POST['add_image'])){
        $image_name = $_FILES['image_photo']['name'];
        $image_tmp = $_FILES['image_photo']['tmp_name'];

        $rename_image = uniqid().$image_name;
        $directory  = '../gallery_photo/'.$rename_image;

        move_uploaded_file($image_tmp,$directory);

        $sql = "INSERT INTO gallery(image_photo) VALUES('$rename_image')";

        $result = mysqli_query($con,$sql);
        if($result){
          header("location: ../index.php");
        }
    }

}