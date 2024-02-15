<?php 
    $msg = "";
    if(isset( $_GET['postStatus'])) {
        $postStatus = $_GET['postStatus'];
        if($postStatus == true) {
            $msg = "Posted successfully."."<a href='posts.php'>View posts here </a>";
        } else {
            $msg = "posting failed.";
        }
    }
?>

<?php 
    $pageTitle = "View details Page";
    $bodyBackGroundImage = "https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33";
    include("header.php");
?>

<h1 class="text-center mt-5" >CREATE YOUR POST HERE</h1>
    <div class="d-flex flex-row justify-content-center mt-5">
        <form action="createpostfunc.php" method="post" enctype="multipart/form-data">
            <div class="label-input mb-3">
                <label for="title" class="form-label">Title</label>
                <input id="title" type="text" required placeholder="title" name="title" class="form-control" />
            </div>
            <div class="label-input mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea id="desc"class="form-control" placeholder="write your description here" name="desc"></textarea>
            </div>
            <div class="label-input mb-3">
                <label for="image" class="form-label">Post image</label>
                <input id="image" type="file" accept="image/jpg, image/jpeg, image/png" name="image" class="form-control"/>
            </div>
            <div class="m-4 text-center">
            <button class="btn btn-primary" type="submit" value="Post">Post</button>
            </div>  
        </form>
    </div>
    <?php if(!empty($postStatus)): ?>  
        <div class="text-center mt-3">
            <?php echo $msg ?>
        </div>    
    <?php endif; ?>
    <?php include('footer.php')?>
</body>
</html>