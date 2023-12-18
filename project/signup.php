<?php require 'partials/db_connect.php' ?>
<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $check_sql = "SELECT * FROM `users` WHERE `username`='$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $showError = "Username already exists. Please choose a different username.";
    } else {
        if ($password == $cpassword) {
            $insert_sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $insert_sql);

            if ($result) {
                $showAlert = true;
            } else {
                $showError = "Error: " . mysqli_error($conn);
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(130, 129, 129);
            z-index: -1;
            backdrop-filter: blur(10px);
        }

        body {
            background-color: rgb(130, 129, 129);
        }

        .my-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .container {
            width: 75%;
            padding: 0px;
            margin-bottom: 70px;
            background-color: white;
            margin-top: 70px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            align-items: center;
            justify-content: center;
            border-radius: 20px;
        }

        .brand {
            color: #080808;
        }

        .sign-container {
            max-width: 470px;
            margin-top: 150px;
        }

        .left-box {
            background-image: url(just\ do\ it.jpg);
            background-repeat: no-repeat;
            background-size: 100% 100%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .left-box p {
            margin-top: 510px;
        }

        .inputbox {
            border: 1px solid #cfcece;
            outline: none;
        }

        .inputbox:focus {
            border: 2px solid #082418;
        }

        .input-label {
            top: -12px;
            left: 3%;
        }

        .log-in {
            background: #3d3d3d;
            color: #fff;
        }

        .log-in:hover {
            background: #fff;
            color: #000000;
            border: 1px solid #000000;
        }

        .btn:hover {
            background: grey;
        }
    </style>
</head>

<body>
    <?php require 'partials/navbar_v2.php'?>
    <?php
    // your php code for checking user input and database connection
    // ...
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> ' . $showAlert . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    ?>



    <form action="signup.php" method="post">
        <div class="container">
            <section class="container-fluid">
                <div class="row vh-100">
                <div class=" col-md-4 left-box d-flex">
                        <div class="text-white text-center m-auto m-4 p-4">
                            <p class="fs-5 my-6">
                                <b style="font-size: 35px;">Already a user?</b><br>
                                Login now and explore!
                            </p>
                            <a href="login.php" class="btn fw-bold btn-lg border-white rounded-5 px-5 fs-6 text-white">
                                Login
                            </a>
                        </div>
                    </div>
                    <div class="offset-md-1 col-md-6 col-12">
                        <div class="px-4 sign-container mx-auto">
                            <div class="text-center mt-5">
                                <h2 class="fw-bold brand fs-1 my-4">Create an Account</h2>
                                <div class="position-relative my-4">
                                    <input class="form-control inputbox shadow-none p-2" type="text" name="username" placeholder="Enter your username" />
                                    <div class="input-label position-absolute px-2 bg-white z-1">
                                        <label for="username" class="control-label">Username</label>
                                    </div>
                                </div>
                                <div class="position-relative my-5">
                                    <input class="form-control inputbox shadow-none p-2" type="password" name="password" placeholder="Enter your password" />
                                    <div class="input-label position-absolute px-2 bg-white z-1">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                </div>
                                <div class="position-relative my-5">
                                    <input class="form-control inputbox shadow-none p-2" type="password" name="cpassword" placeholder="Confirm your password" />
                                    <div class="input-label position-absolute px-2 bg-white z-1">
                                        <label for="cpassword" class="control-label">Confirm Password</label>
                                    </div>
                                </div>
                                <button class="btn my-5 fw-bold btn-lg log-in rounded-5 px-5 fs-6" type="submit">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </section>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#alertSuccess, #alertError").on('closed.bs.alert', function () {

            });
        });
    </script>
</body>

</html>