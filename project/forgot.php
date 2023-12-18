<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Include your CSS and Bootstrap if needed -->
</head>

<body>
    <?php
    session_start();

    // Include your database connection file
    include 'partials/db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["username"];

        // Validate email (you may need more robust email validation)
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check if the email exists in the database
            $query = "SELECT * FROM users WHERE username = '$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                // Generate a unique token (you may use a better method for token generation)
                $token = bin2hex(random_bytes(32));

                // Store the token in the database for the user
                $updateQuery = "UPDATE users SET reset_token = '$token' WHERE username = '$email'";
                mysqli_query($conn, $updateQuery);

                // Send an email to the user with the reset link (you need to implement this part)
                $resetLink = "http://yourwebsite.com/reset.php?token=$token";
                // mail($email, "Password Reset", "Click on the link to reset your password: $resetLink");

                // For the purpose of this example, we'll redirect to a confirmation page
                header("Location: reset.php");
                exit();
            } else {
                $error = "Email not found";
            }
        } else {
            $error = "Invalid email format";
        }
    }

    mysqli_close($conn);
    ?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center">Forgot Password</h2>
                <form method="post" action="reset.php">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>