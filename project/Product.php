<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Product</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Style all font awesome icons
        .fa {
            padding: 6px;
            font-size: 22px;
            width: 40px;
            text-align: center;
            text-decoration: none;
            float: right;
            margin-right: 5px;
            border-radius: 50%;
        }

        Add a hover effect if you want
        .fa:hover {
            opacity: 0.7;
        }

        Set a specific color for each brand

        Facebook
        .fa-facebook {
            background: #3B5998;
            color: white;
            margin-top: 10px;
        }

        Twitter
        .fa-twitter {
            background: #55ACEE;
            color: white;
            margin-top: 10px;
        }

        .fa-youtube {
            background: red;
            color: white;
            margin-top: 10px;
        }

        .fa-instagram {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            color: white;
            margin-top: 10px;
        }

        .menu {
            background-color: grey;
        }

        .menu ul {
            overflow: auto;
        }

        .menu li {
            list-style: none;
            float: left;
            margin: 10px 138px 13px;
            font-size: large;
        }

        .menu li a {
            padding: 3px 3px;
            text-decoration: none;
            color: black;
        }

        .menu li a:hover {
            color: #285AEB;
            text-decoration: dotted;
        }

        .dblock {
            width: 100%;
            height: 75%;
        }

        .container {
            text-align: center;
            padding: 3px;

            background-color: gray;
        } */

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

        .card {
            float: left;
            margin-left: 5.5%;
            width: 30%;
            margin-bottom: 20px;
        }

        .product-container {
            margin-top: 4%;
            width: 100%;
            height: 90%;
        }

        .btn {
            margin-right: 5px;
        }

        .full-description {
            display: none;
        }
    </style>

</head>

<body>
    <?php require 'partials/navbar_v1.php';
    require 'partials/db_connect.php';
    $sql = "SELECT * FROM product_info";
    $result = mysqli_query($conn, $sql); ?>

    <section>
        <div>
            <h1 style="text-align: center ; margin-top: 10px;">Product List</h1>
        </div>
        <div class="product-container">

            <?php
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
                    echo '<p class="description" style="margin: 0px;">' . nl2br($shortDescription) . '<span class="full-description" style="display:none;">' . nl2br(substr($fullDescription, $halfLength)) . '</span></p>';
                    echo '<button class="toggle-description btn btn-primary">Read More</button>';
                    echo '<a href="#" class="btn btn-primary">Order now</a>';
                    echo '</div></div>';
                }
            } else {
                echo "<p>No products found</p>";
            }

            ?>

            <!-- Include jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <!-- jQuery script for toggling description -->
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('.toggle-description').on('click', function() {
                var cardBody = $(this).closest('.card-body');
                var description = cardBody.find('.description');

                // Toggle visibility of full description
                description.children('.full-description').slideToggle();

                // Toggle button text
                var buttonText = description.children('.full-description').is(':visible') ? 'Read Less' : 'Read More';
                $(this).text(buttonText);
            });
        });
    </script>

    <?php require 'partials/footer.php' ?>


</body>

</html>