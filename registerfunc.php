<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('database.php');
    
        $name = $_POST['name'];
        $name = preg_replace('/[^a-zA-Z\s]/', '', $name);
        $username = $_POST['username'];
        $username = strtolower($username);
        $iput_email = $_POST['email'];
        $email = filter_var($input_email, FILTER_SANITIZE_EMAIL); 
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        
        $registrationStatus = "";

        if(strlen($username) < 8) {
            $registrationStatus = "Username must be at least 8 characters long.";
        } else {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $registrationStatus = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }else{
                if($password != $confirmpassword) {
                    $registrationStatus = "Password not matching";
                } else {
                    $passwordhashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $checkQuery = "SELECT * FROM userstable WHERE username = '$username' AND email = '$email'";
                    $result = mysqli_query($conn, $checkQuery);
            
                    if (mysqli_num_rows($result) > 0) {
                        $registrationStatus ="Username already exists. Please choose a different username or email. <br> <a href='login.php'>Login here</a>.";
                    } else {
                        $query = "INSERT INTO userstable (name, username, email, password) VALUES ('$name','$username','$email', '$passwordhashed')";
                
                        try {
                            mysqli_query($conn, $query);
                            $registrationStatus = "Registration successful. <a href='login.php'>Login here</a>.";
                        } catch (mysqli_sql_exception) {
                            $registrationStatus = "Registration failed. Please try again later.";
                        }
                    }
                    mysqli_close($conn);
                }
                
            }      
    } 
} 
    
?>