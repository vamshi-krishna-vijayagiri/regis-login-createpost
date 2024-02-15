
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('https://img.freepik.com/free-vector/abstract-blue-background-with-curve-lines_53876-117179.jpg?w=826&t=st=1706507161~exp=1706507761~hmac=8c9e327ebc90ecd46f29000b2ebeb08beafb0d9fd74710d403f88e084217db33'); height: 100vh; background-size: cover;">
    <h1 class="text-center mt-5" >REGISTER HERE</h1>
    <div class="d-flex flex-row justify-content-center mt-5">
        <form action="register.php" method="post">
        <div class="label-input mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" required placeholder="name" name="name" class="form-control"/>
            </div>
            <div class="label-input mb-3">
                <label for="userName" class="form-label">User Name</label>
                <input id="userName" type="text" required placeholder="username" name="username" class="form-control"/>
            </div>
            <div class="label-input mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" required placeholder="email" name="email" class="form-control"/>
            </div>
            <div class="label-input mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" required placeholder="password" name="password" class="form-control"/>
            </div>
            <div class="label-input">
                <label for="confirmpassword" class="form-label">Confirm password</label>
                <input id="confirmpassword" type="password" required placeholder="Re-enter password" name="confirmpassword" class="form-control mb-3"/>
                <ul>
                    <li>Atleast 8 characters long</li>
                    <li>A combination of atleast one (uppercase, lowercase, number and symbol)</li>
                </ul>
            </div>
            <div class="m-4 text-center">
                <button class="btn btn-primary" type="submit" value="Register">Register</button>
            </div>  
        </form>
    </div>
    <p class="text-center">Already have an account? <a href="login.php">login here</a></p>
    <?php include('registerfunc.php'); ?>
    <?php if (!empty($registrationStatus)): ?>  
        <div class="text-center mt-3">
            <?php echo $registrationStatus; ?>
        </div>
    <?php endif; ?>
</body>
</html>



