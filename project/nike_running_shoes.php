<?php
// nike_running_shoes.php

// Include necessary files and database connection
require 'partials/navbar_v1.php';
require 'partials/db_connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get and sanitize product ID
    $productId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch product details from the database based on the product ID
    $sql = "SELECT * FROM product_info WHERE id = $productId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display product details on the page
        ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Product</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title><?php echo $row["productName"]; ?></title>
        <style>
            footer {

                width: 100%;
                height: 20%;
                margin-right: 110px;
                background-color: black;
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
                padding: 0px 0px;
                text-decoration: none;
                font-size: 17px;
                width: 23%;
            }

            .footnav a:hover {
                opacity: 0.5;
            }

            
        </style>
    </head>

    <body>

        <section>
            <div>
                <h1 style="text-align: center; margin-top: 10px;"><?php echo $row["productName"]; ?></h1>
            </div>
            <div class="product-container">
                <div class="card" style="width: 25rem;">
                    <img src="<?php echo $row["productprofile"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row["productName"]; ?></h3>
                        <h4> Rs: <?php echo $row["productPrice"]; ?></h4>
                        <p class="description" style="margin: 0px;"><?php echo nl2br($row["productDetails"]); ?></p>
                        <!-- Add other product details here -->
                        <a href="#" class="btn btn-primary">Order now</a>
                    </div>
                </div>
            </div>
        </section>

        <?php require 'partials/footer.php'; ?>

    </body>

    </html>

<?php
} else {
    echo "<p>Product not found</p>";
}

// Include footer
require 'partials/footer.php';
?>