<?php
include('database.php');
session_start();

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $query = "SELECT * FROM poststable WHERE post_id = '$post_id'";
    $result = mysqli_query($conn, $query);

    $display = null;

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $post_image = $row['post_image'];
        $post_title = $row['post_title'];
        $post_desc = $row['post_desc'];
        $posted_date = $row['posted_date'];

        $display = '<div class="d-flex flex-row justify-content-center mt-5">
                       <div class="card d-flex flex-column align-items-center" style="width: 50%;">
                            <img src="images/posted_images/'.$post_image.'" class="card-img-top mt-4" style="width: 150px;" alt="image">
                                <div class="card-body text-center">
                                    <h5 class="card-title">'.$post_title.'</h5>
                                    <p class="card-text">'.$post_desc.'</p>
                                    <p class="card-text">Posted on: '.$posted_date.'</p>
                                    
                               </div>
                               <div>
                               <a href="editpost.php?post_id='.$post_id.'" class="btn btn-primary m-2">Edit</a>
                               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
                               <div/>
                        </div>
                    </div>';
        }
    }    

?>

<?php 
    $pageTitle = "Edit Post Page";
    $bodyBackGroundImage = "https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33";
    include("header.php");
?>

    <div><?php echo $display ?></div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Confirmation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <P>Are you sure want to delete this post?</P>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <a href="deletepost.php?post_id=<?php echo $post_id?>" class="btn btn-primary m-2">Delete</a>
        </div>
        </div>
    </div>
    </div>
    <?php include('footer.php')?>
</body>
</html>

<?php mysqli_close($conn); ?>

