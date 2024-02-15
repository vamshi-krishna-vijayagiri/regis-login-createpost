<?php
include('functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginStatus = user_login($_POST);
    if ($loginStatus == "success") {
        header('Location: welcome.php');
    } else {
        header('Location: login.php?loginStatus='.$loginStatus);
    }
}
?>

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     include('database.php');
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $query = "SELECT * FROM userstable WHERE username='$username'";
//     $result = mysqli_query($conn, $query);
//     $row = mysqli_fetch_assoc($result);

//     $loginStatus = "";
//     if ($row && password_verify($password, $row['password'])) {
//         $_SESSION["id"] = $row['id'];
//         $_SESSION["username"] = $row['username'];
//         header("Location: welcome.php");
//         exit();
//     } else {
//         $loginStatus = "Invalid username or password. Please try again.";
//     }

//     mysqli_close($conn);
// }
?>