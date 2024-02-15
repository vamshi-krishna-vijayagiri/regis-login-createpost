<?php
    // include('database.php');
    // include('functions.php');

    // $editPostStatus = "";
    
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $post_id = $_POST['post_id'];
    //     $title = $_POST['title'];
    //     $input_desc = $_POST['desc'];
    //     $post_image = $_FILES['image']['name'];

    //     $sensitiveWords = array("bloody", "busted");
    //     $desc = replace_bad_words($input_desc, $sensitiveWords);

    //     $post_image_tmp_name = $_FILES['image']['tmp_name'];
    //     $post_image_name = create_image_unique_name($post_image); 
    //     $post_image_folder = 'images/posted_images/' . $post_image_name;

    //     if (!empty($post_image)) {
    //         $editPostQuery = "UPDATE poststable SET post_title='$title', post_desc='$desc', post_image='$post_image_name' WHERE post_id='$post_id'";
    //     } else {
    //         $editPostQuery = "UPDATE poststable SET post_title='$title', post_desc='$desc' WHERE post_id='$post_id'";
    //     }
    
    //     try {
    //         $editing_post = mysqli_query($conn, $editPostQuery);
    //         if($editing_post) {
    //             move_uploaded_file($post_image_tmp_name, $post_image_folder);
    //         }
    //         $editPostStatus = "edited successfully. <a href='posts.php'>View posts here</a>.";
    //     } catch (Exception $e) {
    //         $editPostStatus = "editing failed. Error: " . $e->getMessage() . ". Please try again later.";
    //     }
    // }

    // $post_id = isset($_REQUEST['post_id']) ? $_REQUEST['post_id'] : null;
    // $query = "SELECT * FROM poststable WHERE post_id='$post_id'";
    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);
 
    // $post_title = $row['post_title'];
    // $post_desc = $row['post_desc'];
    // $post_image = $row['post_image'];

?>

<?php
    include('functions.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edit_post_image = $_FILES['image']['name'];

        $postIdAndEditPostStatus = edit_post($_POST, $edit_post_image);
        $post_id = $postIdAndEditPostStatus['post_id'];
        $editPostStatus = $postIdAndEditPostStatus['editPostStatus'];
        header('location: editpost.php?post_id=' . $post_id . '&editPostStatus=' . $editPostStatus);
    }

?>