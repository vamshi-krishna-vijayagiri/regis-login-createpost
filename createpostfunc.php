<?php
    include('functions.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$user_id =  $_SESSION['id'];
        // $title = $_POST['title'];
        // $input_desc = $_POST['desc'];
        $post_image = $_FILES['image']['name'];

        $postStatus = create_post($_POST, $post_image);
        header('location: createpost.php?postStatus='.$postStatus);
    }
?>