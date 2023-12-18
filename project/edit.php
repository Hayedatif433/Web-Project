<?php

// Establish a connection to the database
require("partials/db_connect.php");
$showAlert = false;
$showError = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if the connection is successful
    if ($conn) {
        // Get form data
        $productId = $_POST["productId"];
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productCode = $_POST["productCode"];
        $productInstock = $_POST["productInstock"];
        $productDiscount = $_POST["productDiscount"];
        $productSizes = $_POST["productSizes"];
        $productDetails = $_POST["productDetails"];

        // Update data in the database using prepared statement
        $stmt = $conn->prepare("UPDATE product_info SET productName=?, productPrice=?, productCode=?, productInstock=?, productDiscount=?, productSizes=?, productDetails=? WHERE productId=?");
        $stmt->bind_param("sdssisss", $productName, $productPrice, $productCode, $productInstock, $productDiscount, $productSizes, $productDetails, $productId);

        if ($stmt->execute()) {
            $showAlert = true;
        } else {
            $showError = "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        mysqli_close($conn);
    } else {
        $showError = 'Can not connect to the database';
    }
}

// Fetch the product details for the specified productId
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    if ($conn) {
        $sql = "SELECT * FROM product_info WHERE productId = '$productId'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $productName = $row['productName'];
            $productPrice = $row['productPrice'];
            $productCode = $row['productCode'];
            $productInstock = $row['productInstock'];
            $productDiscount = $row['productDiscount'];
            $productSizes = $row['productSizes'];
            $productDetails = $row['productDetails'];
        } else {
            $showError = 'No product found with given ID';
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        $showError = 'Can not connect to the database';
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <style>
        .edit-container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        .edit-form {
            margin-top: 20px;
        }

        .edit-form label {
            display: block;
            margin-top: 10px;
        }

        .edit-form input,
        .edit-form select,
        .edit-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .edit-form button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-form button:hover {
            background-color: #0056b3;
        }

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
    </style>
</head>

<body>
    <?php require 'partials/navbar_v1.php' ?>
    <?php

    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Record updated succesfully</strong> ' . $showAlert . '
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
    <div class="edit-container">
        <h2>Edit Product</h2>


        <form class="edit-form" action="edit.php" method="post">
            <input type="hidden" name="productId" value="<?php echo $productId; ?>">

            <label for="productName">Product Name:</label>
            <input type="text" name="productName" id="productName" value="<?php echo $productName; ?>" required>

            <label for="productPrice">Product Price:</label>
            <input type="number" name="productPrice" id="productPrice" value="<?php echo $productPrice; ?>" required>

            <label for="productCode">Product Code:</label>
            <input type="text" name="productCode" id="productCode" value="<?php echo $productCode; ?>" required>

            <label for="productInstock">Product In Stock:</label>
            <select name="productInstock" id="productInstock" required>
                <option value="1" <?php if ($productInstock == 1) echo 'selected'; ?>>Yes</option>
                <option value="0" <?php if ($productInstock == 0) echo 'selected'; ?>>No</option>
            </select>

            <label for="productDiscount">Product Discount:</label>
            <input type="number" name="productDiscount" id="productDiscount" value="<?php echo $productDiscount; ?>" required>

            <label for="productSizes">Product Sizes:</label>
            <input type="text" name="productSizes" id="productSizes" value="<?php echo $productSizes; ?>" required>

            <label for="productDetails">Product Details:</label>
            <textarea name="productDetails" id="productDetails" rows="5" required><?php echo $productDetails; ?></textarea>

            <br>

            <button type="submit">Update</button>
        </form>
    </div>

   <?php require'partials/footer.php'?>
</body>

</html>