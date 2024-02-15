<?php 
    session_start();
    $username =  $_SESSION['username'];
?>

<?php
    $pageTitle = "Welcome Page Edit";
    $bodyBackGroundImage = "https://images.pexels.com/photos/1037992/pexels-photo-1037992.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1";
    include("header.php");
?>
    <h1 class="text-center mt-5">Hai <?php echo $username ?>!</h1>
    <div class="text-center mt-4">
    <a href="viewdetails.php" class="btn btn-primary" value="viewdetails">View details</a>   
    </div>
    <?php include('footer.php')?>
</body>
</html>