<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
        .dblock {
            width: 100%;
            height: 75%;
        }

        .container {
            text-align: center;
            padding: 3px;

            background-color: gray;
        }

        footer {

            width: 100%;
            height: 20%;
            margin-right: 100px;
            background-color: grey;
            overflow: hidden;
            margin-top: 70px;
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

        .card {
            float: left;
            margin-left: 5.5%;
            width: 30%;
        }

        .product-container {
            margin-top: 4%;
            width: 100%;
            height: 90%;
        }

        .full-description {
            display: none;
        }

        .card {
            border: none;
        }

        .card:hover {
            box-shadow: 0px 0px 15px black;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>

<body>
    <header>
        <div>

            <?php require 'partials/navbar_v1.php' ?>
        </div>

        <section>

            <div>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="nike1.jpg" class="dblock" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="nike2.png" class="dblock" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="nike3.jpg" class="dblock" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div>
                <img src="cr7.jpg" alt="Goat " style="margin-top: 30px; width: 100%; height: 90%;">
            </div>
            <div>
                <h1 style="font-family: 'Times New Roman', Times, serif; margin-top: 20px; text-align: center; font-size: 70px;"><b>#JUSTDOIT</b></h1>
            </div>
            <!-- Product -->
            <section>
                <div>
                    <h5>Featured Products</h5>
                </div>
                <div class="product-container">
                    <?php
                    // Include the database connection code
                    require 'partials/db_connect.php';

                    // Fetch the first 3 products from the database
                    $sql = "SELECT * FROM product_info LIMIT 3";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fullDescription = $row["productDetails"];
                            $halfLength = strlen($fullDescription) / 2;
                            $shortDescription = substr($fullDescription, 0, $halfLength);

                            echo '<div class="card" style="width: 25rem;">';
                            echo '<img src="' . $row["productprofile"] . '" class="card-img-top" alt="...">';
                            echo '<div class="card-body">';
                            echo '<h3 class="card-title">' . $row["productName"] . '</h3>';
                            echo '<h4> Rs: ' . $row["productPrice"] . '</h4>';
                            echo '<p class="card-text description" style="margin: 0px;">' . $shortDescription . '<span class="full-description" style="display:none;">' . substr($fullDescription, $halfLength) . '</span></p>';
                            echo '<button class="toggle-description btn btn-primary">Read More</button>';
                            echo '<a href="#" class="btn btn-primary">Order now</a>';
                            echo '</div></div>';
                        }
                    } else {
                        echo "<p>No products found</p>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>
            </section>

            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <!-- jQuery script for toggling description -->
            <script>
                $(document).ready(function() {
                    $('.toggle-description').on('click', function() {
                        var cardBody = $(this).closest('.card-body');
                        var shortDescription = cardBody.find('.short-description');
                        var fullDescription = cardBody.find('.full-description');

                        fullDescription.slideToggle();

                        var buttonText = fullDescription.is(':visible') ? 'Read Less' : 'Read More';
                        $(this).text(buttonText);
                    });
                });
            </script>
        </section>

        <!-- <footer>
            <div class="foot">
                <div>

                    <h4><i>NIKE</i></h4>
                    <p>© 2023 NIKE, Inc</p>

                </div>
                <div class="footnav">
                    <a href="About.html">Home</a>
                    <a href="contactus.html">Contact</a>
                    <a href="Contact.html">Address</a>
                    <a href="Product.html">Product</a>

                </div>



            </div>
        </footer> -->
        <?php require 'partials/footer.php'?>

</body>

</html>