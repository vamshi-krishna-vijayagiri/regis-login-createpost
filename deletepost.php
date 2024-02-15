<?php
include('database.php');

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $query = "DELETE FROM poststable WHERE post_id = '$post_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: posts.php");
        exit();
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
