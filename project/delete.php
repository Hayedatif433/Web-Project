<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    require("partials/db_connect.php");

    // Check if the connection is successful
    if ($conn) {
        // Get the product ID from the URL
        $productId = $_GET["id"];

        // Delete data from the database
        $sql = "DELETE FROM product_info WHERE productId='$productId'";

        if (mysqli_query($conn, $sql)) {
            $showAlert = true;
        } else {
            $showError = "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        $showError = 'Can not connect to database';
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete listing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        footer {
            position: relative;
            width: 100%;
            height: 20%;
            margin-right: 110px;
            background-color: grey;
            overflow: hidden;
        }


        .foot h4 {
            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
            margin-right: 15px;
            font-size: 28px;
        }

        .foot p {
            text-align: center;
            margin-top: 9px;
            margin-right: 30px;
            color: white;
        }



        .footnav a {

            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 17px;
            width: 23%;
        }

        .footnav a:hover {
            opacity: 0.5;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Set minimum height to 100% of the viewport height */
            margin: 0;
        }

        footer {
            margin-top: auto;
            /* This pushes the footer to the bottom */
            width: 100%;
            height: 20%;
            background-color: grey;
            overflow: hidden;
        }
        .btn{
            margin-left: 10px;
        }
        .alert-dismissible .btn-close {
            
            padding: 0.25rem 1rem;
        }
    </style>
</head>

<body>
    <?php require 'partials/navbar_v1.php'; ?>
    <?php

    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Record Deleted succesfully</strong> ' . $showAlert . '
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
    <div>
        <button class="btn btn-primary" type="button" onclick="window.open('addproduct.php');">Return</button>

    </div>
    <?php require 'partials/footer.php'?>
</body>

</html>