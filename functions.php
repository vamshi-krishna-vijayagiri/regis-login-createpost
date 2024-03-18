<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('database.php');

function user_login($userdata) {
    global $conn;
    $username = mysqli_real_escape_string($conn, $userdata['username']);
    $password = mysqli_real_escape_string($conn, $userdata['password']);

    $query = "SELECT * FROM userstable WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $loginStatus = "";
    if ($row && password_verify($password, $row['password'])) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $loginStatus = "success";
    } else {
        $loginStatus = "failed";
    }
    return $loginStatus;
}


function replace_bad_words($input_str, $sensitiveWords) {
    $replacementStr = "****";
    $result = str_replace($sensitiveWords, $replacementStr, $input_str);
    return $result;
}

function create_image_unique_name($post_image) {
    $post_imageUniqueId = uniqid();
    $post_image_extension = pathinfo($post_image, PATHINFO_EXTENSION); 
    $result = $post_imageUniqueId . '.' . $post_image_extension;
    return $result;
}

function get_current_datatime() {
    date_default_timezone_set('Asia/Kolkata');
    $curren_datatime = date("Y-m-d H:i:s");
    return $curren_datatime;
}

function create_post($data, $post_image) {
    global $conn;
    $user_id = $_SESSION['id'];
    $title = $data['title'];
    $input_desc = $data['desc'];
    $postStatus = "";

    $sensitiveWords = array("bloody", "busted");
    $desc = replace_bad_words($input_desc, $sensitiveWords);

    $post_image_tmp_name = $_FILES['image']['tmp_name'];
    $post_image_name = create_image_unique_name($post_image);
    $post_image_folder = 'images/posted_images/' . $post_image_name;

    $posted_date = get_current_datatime();

    $postQuery = "INSERT INTO poststable (user_id, post_title, post_desc, post_image, posted_date) VALUES ('$user_id','$title','$desc', '$post_image_name', '$posted_date')";
    try {
        $creating_post = mysqli_query($conn, $postQuery);
        if($creating_post) {
            move_uploaded_file($post_image_tmp_name, $post_image_folder);
        }
        $postStatus = true;
    } catch (Exception $e) {
        $postStatus = "Posting failed. Error: " . $e->getMessage() . ". Please try again later.";
    }
    return $postStatus;
}


function edit_post($data, $post_image) {
    global $conn;
    $post_id = $data['post_id'];
    $title = $data['title'];
    $input_desc = $data['desc'];
    $editPostStatus = "";

    $sensitiveWords = array("bloody", "busted");
    $desc = replace_bad_words($input_desc, $sensitiveWords);

    $post_image_tmp_name = $_FILES['image']['tmp_name'];
    $post_image_name = create_image_unique_name($post_image); 
    $post_image_folder = 'images/posted_images/' . $post_image_name;

    if (!empty($post_image)) {
        $editPostQuery = "UPDATE poststable SET post_title='$title', post_desc='$desc', post_image='$post_image_name' WHERE post_id='$post_id'";
    } else {
        $editPostQuery = "UPDATE poststable SET post_title='$title', post_desc='$desc' WHERE post_id='$post_id'";
    }

    try {
        $editing_post = mysqli_query($conn, $editPostQuery);
        if($editing_post) {
            move_uploaded_file($post_image_tmp_name, $post_image_folder);
        }
        $editPostStatus = true;
    } catch (Exception $e) {
        $editPostStatus = "editing failed. Error: " . $e->getMessage() . ". Please try again later.";
    }
    $postId_editPostStatus['post_id'] = $post_id;
    $postId_editPostStatus['editPostStatus'] =  $editPostStatus;
    return $postId_editPostStatus;
}

function display_post($post_id) {
    global $conn;
    $query = "SELECT * FROM poststable WHERE post_id='$post_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}


?>