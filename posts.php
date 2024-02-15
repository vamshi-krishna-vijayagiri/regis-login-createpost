<?php
    include('database.php');
    session_start();
    $user_id = $_SESSION['id'];

    $postsPerPage = 3;
    $start = 0;

    if(isset($_GET['start'])) {
        $currentPage = $_GET['start'];
        $start = ($currentPage - 1) * $postsPerPage;
    } else {
        $currentPage = 1;
        $start = 0;
    }
    
    $query = "SELECT * FROM poststable WHERE user_id = '$user_id' ORDER BY posted_date DESC LIMIT $start, $postsPerPage";
    $result = mysqli_query($conn, $query);

    $display = null;
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['post_id'];
            $post_image = $row['post_image'];
            $post_title = $row['post_title'];
            $post_desc = $row['post_desc'];
            $posted_date = $row['posted_date'];


            $display .= '<div class="card text-center m-4">
                            <div class="card-body d-flex flex-row">
                               <div> <img src="images/posted_images/'.$post_image.'" style= "width: 150px"; alt="Post Image"/> </div>
                               <div class="ml-5">
                                <h5 class="card-title">'.$post_title.'</h5>
                                <p class="card-text">'.$post_desc.'</p>
                                <a href="viewpost.php?post_id='.$post_id.'" class="btn btn-primary">View Post</a>
                                </div>
                            </div>
                            <div class="card-footer text-body-secondary">'.$posted_date.'</div>
                        </div>';           
        }
    } else {
        $display = "No posts found for the user";
    }


    $totalPosts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM poststable WHERE user_id = '$user_id'"));
    $totalPages = ceil($totalPosts / $postsPerPage);

    $pagination = '<nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">';

    for ($i = 1; $i <= $totalPages; $i++) {
        $activeClass = ($i == $currentPage) ? 'active' : '';
        $pagination .= '<li class="page-item ' . $activeClass . '">
                            <a class="page-link" href="?start=' . $i . '">' . $i . '</a>
                        </li>';
    }

    $pagination .= '</ul></nav>';
?>

<?php 
    $pageTitle = "Posts Page";
    $bodyBackGroundImage = "https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33";
    include("header.php");
?>
    <div class="m-4">
    <a href= "createpost.php" class="btn btn-primary" value="createpost">+ Create post</a>
    </div>

    <div><?php echo $display ?></div>
    <div class="mt-4"><?php echo $pagination ?></div>
    <?php include('footer.php')?>
</body>
</html>

<?php mysqli_close($conn); ?>;

