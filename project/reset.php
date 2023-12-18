<?php
session_start();

// Include your database connection file
include 'partials/db_connect.php';

// Validate the token from the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $query = "SELECT * FROM users WHERE reset_token = '$token'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Token is valid
            echo "Token is valid";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newPassword = $_POST["new_password"];

                // Validate and hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $row = mysqli_fetch_assoc($result);
                $userId = $row['id'];

                $updateQuery = "UPDATE users SET password = '$hashedPassword', reset_token = NULL WHERE id = '$userId'";
                mysqli_query($conn, $updateQuery);

                // For the purpose of this example, we'll redirect to a login page
                header("Location: login.php");
                exit();
            }
        } else {
            // Invalid token
            echo "Invalid token";
        }
    } else {
        // Error in querying the database
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Token not provided
    echo "Token not provided";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Include your CSS and Bootstrap if needed -->
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center">Reset Password</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>