<?php
include("connection.php");
session_start();

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

 
    // Basic validation
    if (empty($email) || empty($password)) {
        $errorMessage = "Please fill in all fields.";
    } else {
        // Prepare and execute the query to check credentials
        $stmt = $conn->prepare("SELECT email, password FROM signupusers WHERE email = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_email, $db_hashed_password);
            $stmt->fetch();

            // Verify the provided password with the hashed password in the database
            if (password_verify($password, $db_hashed_password)) {
                // Store the user's email in the session (or any other necessary data)
                $_SESSION['email'] = $db_email;
                // Redirect to the home page
                header("Location: home.php");
                exit(); // Always call exit after redirecting
            } else {
                $errorMessage = "Wrong password.";
            }
        } else {
            $errorMessage = "Email did not match our records.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Login Page</title>
    <style>
        /* Header styles */
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #444;
            text-align: center;
            margin-top: 50px; 
        }

        /* Login Container */
        form {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            width: 100%;
            max-width: 400px;
            padding: 20px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .form-row div {
            margin-bottom: 15px;
        }

        .form-row label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-row input[type="email"],
        .form-row input[type="password"] {
            width: 100%; /* Full width input fields */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button.btn {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button.btn:hover {
            background-color: #4cae4c;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            margin: 10px 0;
            text-align: center;
        }

        /* Links styling */
        p {
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: #5cb85c;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Login Page</h1>
    
    <form action="login.php" method="post">
        <?php if (!empty($errorMessage)): ?>
            <div class="error-message"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>
        
        <div class="form-row">
            <div>
                <label for="email">Enter Your Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Enter Your Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit" class="btn" name="btn">Login</button>
            </div>
        </div>
        <p><a href="index.php">Back to Home</a></p>
    </form>
</body>
</html>
