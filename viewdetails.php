<?php
    session_start();
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
    $pageTitle = "View details Page";
    $bodyBackGroundImage = "https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33";
    include("header.php");
?>
    <h1 class="text-center mt-5" >VIEW DETAILS HERE</h1>
    <div class="d-flex flex-row justify-content-center mt-5">
        <form action="" method="">
        <img src="images/uploaded_images/<?php echo $image; ?>" alt="Profile Image" style="max-width: 150px; max-height: 150px; margin: 10px;" class="mb-4">
            <div class="label-input mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" required placeholder="name" name="name" class="form-control" value="<?php echo $name; ?>" disabled/>
            </div>
            <div class="label-input mb-3">
                <label for="username" class="form-label">User Name</label>
                <input id="username" type="text" required placeholder="username" name="username" class="form-control" value="<?php echo $username; ?>" disabled/>
            </div>
            <div class="label-input mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" required placeholder="email" name="email" class="form-control" value="<?php echo $email; ?>" disabled/>
            </div>
            <div class="m-4 text-center">
                <a href= "editdetails.php" class="btn btn-primary" value="editdetails">Edit details</a>
            </div>  
        </form>
    </div>
    <?php include('footer.php')?>
</body>
</html>