<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $msg = "";
    if(isset( $_GET['loginStatus'])) {
        $loginStatus = $_GET['loginStatus'];
        if($loginStatus == "failed") {
            $msg = "Invalid username or password. Please try again.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33'); height: 100vh; background-size: cover;">
    <h1 class="text-center mt-5">LOGIN HERE</h1>
    <div class="d-flex flex-row justify-content-center m-4">
        <form action="loginfunc.php" method="post">
        <div class="label-input mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" type="text" required placeholder="username" name="username" class="form-control" required/>
            </div>
            <div class="label-input">
                <label for="password">Password</label>
                <input id="password" type="password" required placeholder="password" name="password" class="form-control" required/>
            </div>
            <div class="mt-4 text-center">
                <button class="btn btn-primary" type="submit" >Login</button>
            </div>
        </form>
    </div>
    <p class="text-center">Not registered? <a href="register.php">Register here</a></p>
    <?php if(!empty($loginStatus)): ?>  
        <div class="text-center mt-3">
            <?php echo $msg ?>
        </div>    
    <?php endif; ?>
</body>
</html>





