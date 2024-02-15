<?php include('editdetailsfunc.php'); ?>
<?php
    $id =  $_SESSION['id'];
    include('database.php');
    $query = "SELECT * FROM userstable WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    $image = $row['image'];
?>


<?php 
    $pageTitle = "Edit details Page";
    $bodyBackGroundImage = "https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33";
    include("header.php");
?>
<h1 class="text-center mt-5" >EDIT YOUR DETAILS HERE</h1>
    <div class="d-flex flex-row justify-content-center mt-5">
        <form action="editdetails.php" method="post" enctype="multipart/form-data">
            <div class="label-input mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" required placeholder="name" name="name" class="form-control" value="<?php echo $name; ?>"/>
            </div>
            <div class="label-input mb-3">
                <label for="username" class="form-label">User Name</label>
                <input id="username" type="text" required placeholder="username" name="username" class="form-control" value="<?php echo $username; ?>" disabled/>
            </div>
            <div class="label-input mb-3">
                <label for="email" class="form-label">Email</label> 
                <input id="email" type="email" required placeholder="email" name="email" class="form-control" value="<?php echo $email; ?>"/>
            </div>
            <div class="label-input mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" required placeholder="password" name="password" class="form-control"/>
            </div>
            <div class="label-input mb-3">
                <label for="image" class="form-label">Profile photo</label>
                <input id="image" type="file" accept="image/jpg, image/jpeg, image/png" name="image" class="form-control"/>
            </div>
            <div class="m-4 text-center">
            <a href="viewdetails.php" class="btn btn-primary" value="viewdetails">View details</a>
            <button class="btn btn-primary" type="submit" value="Register">Submit</button>
            </div>  
        </form>
    </div>
   
    <?php if (!empty($editDetailsStatus)): ?>  
        <div class="text-center mt-3">
            <?php echo $editDetailsStatus; ?>
        </div>
    <?php endif; ?>
    <?php include('footer.php')?>
</body>
</html>