<?php
    session_start();
    include('database.php');

    $editDetailsStatus = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $username =  $_SESSION['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        $imageUniqueId = uniqid();
        $image_extension = pathinfo($image, PATHINFO_EXTENSION); 
        $image_name = $imageUniqueId . '.' . $image_extension;
        $image_folder = 'images/uploaded_images/' . $image_name;


        $emailQuery = "SELECT * FROM userstable WHERE username != '$username' AND email = '$email'";
        $result = mysqli_query($conn, $emailQuery);

        if (mysqli_num_rows($result) > 0) {
            $editDetailsStatus = "Email is already in use by another user. Please choose a different email.";
        } else {
            $detailsUpdateQuery = "UPDATE userstable SET name='$name', email='$email', password='$password' WHERE username='$username'";
            
            try {
                mysqli_query($conn, $detailsUpdateQuery);
                $editDetailsStatus = "Details updated successfully.";

                $query = "SELECT * FROM userstable WHERE username='$username'";
                $updatedUserDetails = mysqli_query($conn, $query);
                $updatedUserRow = mysqli_fetch_assoc($updatedUserDetails);

            } catch (mysqli_sql_exception) {
                $editDetailsStatus = "Details update failed. Please try again later.";
            }
        }

        if(!empty($image)){
            $imgQuery = "UPDATE userstable SET image = '$image_name' WHERE username = '$username'";
            $image_update = mysqli_query($conn, $imgQuery);
            if($image_update) {
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        }
    }

    mysqli_close($conn);
?>