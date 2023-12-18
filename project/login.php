<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" />
    <style>
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(130, 129, 129);
            /* Adjust the color and opacity as needed */
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
            /* Add some padding for content inside the container */
            margin-bottom: 70px;
            background-color: white;
            margin-top: 70px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            /* Adjust the shadow as needed */
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            /* Add border-radius to round the corners */
        }

        .brand {
            color: #080808;
        }

        .sign-container {
            max-width: 470px;
            margin-top: 100px;
        }

        .right-box {
            /* background: linear-gradient(black, #3d3b3b); */
            background-image: url(nikeportrait1.jpg);
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-size: 100% 100%;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;


        }

        .right-box p {
            margin-top: 420px;
            /* margin-left: 50px; */
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

        .log-in-border {
            width: 60px;
            border: 2px solid darkgrey;
        }

        .btn:hover {
            background: grey;


        }
    </style>
</head>

<body>
    <?php require 'partials/db_connect.php' ?>
    <?php
    $showAlert = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["login"])) {

            $email = $_POST["email"];
            $password = $_POST["password"];


            $email = mysqli_real_escape_string($conn, $email);
            $password = mysqli_real_escape_string($conn, $password);


            $query = "SELECT * FROM users WHERE username = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if ($result) {

                if (mysqli_num_rows($result) == 1) {

                    header("Location: Welcome.php");
                    exit();
                } else {
?>
                  <?php $showError = "invalid email or password"; 
                }
            } else {

                echo "Error: " . mysqli_error($conn);
            }


            mysqli_free_result($result);
        }
    }


    mysqli_close($conn);

    ?>
   <div> <?php require 'partials/navbar_v2.php'?></div>
    <form action="login.php" method="post">
        

        <div class="container">
            <section class="container-fluid">
                <div class="row vh-100">
                    <div class="col-md-7 col-12">
                        <div class="px-4 sign-container mx-auto">
                            <?php
                            if ($showError) {
                                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> ' . $showError . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> ';
                            }?>
                            <div class="text-center mt-5">
                                <h2 class="fw-bold brand fs-1 my-4">Login in to Account</h2>
   


                                <div class="position-relative my-4">
                                    <input class="form-control inputbox shadow-none p-2" type="text" name="email" placeholder="user1234" />
                                    <div class="input-label position-absolute px-2 bg-white z-1">
                                        <label for="email" class="control-label">Email</label>
                                    </div>
                                </div>
                                <div class="position-relative my-5">
                                    <input class="form-control inputbox shadow-none p-2" type="password" name="password" placeholder="password" />
                                    <div class="input-label position-absolute px-2 bg-white z-1">
                                        <label for="email" class="control-label">Password</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mx-auto">

                                    <a href="forgot.php" class="text-reset text-decoration-none fw-bold">Forgot Password?</a>
                                </div>
                                <button class="btn my-5 fw-bold btn-lg log-in rounded-5 px-5 fs-6" type="submit" name="login">
                                    Login
                                </button>
                                <div class="p-3 mt-3">
                                    <a class="text-decoration-none text-reset" href="#">Privacy Policy</a>
                                    .
                                    <a class="text-decoration-none text-reset" href="#">Terms & Condtions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-1 col-md-4 right-box d-flex">
                        <div class="text-white text-center m-auto m-5 p-5">
                           
                            <p class="fs-5 my-6">
                                <b style="font-size: 45px;">Not a user?</b><br>
                                Sign up now and join us.
                                <a href="signup.php" class="btn fw-bold btn-lg border-white rounded-5 px-5 fs-6 text-white">
                                    Sign Up
                                </a>
                            </p>
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