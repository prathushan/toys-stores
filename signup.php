<?php
include("connection.php");

$generalError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm-password'];

    // Validate email
    if (empty($email)) {
        $generalError .= "Email is required.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $generalError .= "Please enter a valid email address.<br>";
    }

    // Validate password
    $passwordPattern = "/^(?=.*[A-Z])(?=.*[!@#$&*]).{6,}$/";
    if (empty($password)) {
        $generalError .= "Password is required.<br>";
    } elseif (!preg_match($passwordPattern, $password)) {
        $generalError .= "Password must be at least 6 characters long, include one uppercase letter and one special character.<br>";
    }

    // Check if passwords match
    if ($password !== $cpassword) {
        $generalError .= "Passwords do not match.<br>";
    }

    // If no errors, proceed with signup
    if (empty($generalError)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO signupusers (email, password, confirmPwd) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("sss", $email, $hashedPassword, $hashedPassword);

        if ($stmt->execute()) {
            header("Location: home.php");
            exit;
        } else {
            $generalError = "Sign up failed. Please try again. Error: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="signup-container">
        <h2>Create an Account in ToyStores</h2>

        <?php if (!empty($generalError)) echo '<div id="error-messages" class="error-message">' . $generalError . '</div>'; ?>

        <form action="signup.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
            </div>

            <button type="submit" class="btn" name="btn">Create Account</button>
        </form>

        <p>Have an account? <a href="login.php">Go to Login</a></p>
        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html>

