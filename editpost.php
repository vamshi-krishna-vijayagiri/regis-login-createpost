<?php 
    include('functions.php');
    $post_id = isset($_REQUEST['post_id']) ? $_REQUEST['post_id'] : null;
    
    $row = display_post($post_id);
    $post_title = $row['post_title'];
    $post_desc = $row['post_desc'];
    $post_image = $row['post_image'];

    $msg = "";
    if(isset( $_GET['editPostStatus'])) {
        $editPostStatus = $_GET['editPostStatus'];
        if($editPostStatus == true) {
            $msg = "Edited successfully."."<a href='posts.php'>View posts here </a>";
        } else {
            $msg = "Editing failed.";
        }
    }
?>

<?php 
    $pageTitle = "Edit Post Page";
    $bodyBackGroundImage = "https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33";
    include("header.php");
?>

<h1 class="text-center mt-5" >EDIT YOUR POST HERE</h1>
    <div class="d-flex flex-row justify-content-center mt-5">
        <form action="editpostfunc.php" method="post" enctype="multipart/form-data">
        <input id="post_id" type="text" required placeholder="post_id" name="post_id" class="form-control" value="<?php echo $post_id ?>" hidden/>
            <div class="label-input mb-3">
                <label for="title" class="form-label">Title</label>
                <input id="title" type="text" required placeholder="title" name="title" class="form-control" value="<?php echo $post_title ?>"/>
            </div>
            <div class="label-input mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea id="desc"class="form-control" placeholder="write your description here" name="desc" ><?php echo $post_desc ?></textarea>
            </div>
            <div class="label-input mb-3">
                <label for="image" class="form-label">Edit image</label>
                <input id="image" type="file" accept="image/jpg, image/jpeg, image/png" name="image" class="form-control"/>
                <?php if (!empty($post_image)): ?>
                    <img src="images/posted_images/<?php echo $post_image; ?>" class="img-thumbnail mt-2" style="max-width: 200px;" alt="Current Image">
                <?php endif; ?>
            </div>
            <div class="m-4 text-center">
            <button class="btn btn-primary" type="submit" value="Edit Post">Edit Post</button>
            </div>  
        </form>
    </div>
    <?php if(!empty($editPostStatus)): ?>  
        <div class="text-center mt-3">
            <?php echo $msg ?>
        </div>    
    <?php endif; ?>
    <?php include('footer.php')?>
</body>
</html>

