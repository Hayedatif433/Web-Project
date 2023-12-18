<?php
require 'partials/db_connect.php';
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the connection is successful
    if ($conn) {
        // Get form data safely
        $productId = isset($_POST["productId"]) ? $_POST["productId"] : '';
        $productName = isset($_POST["productName"]) ? $_POST["productName"] : '';
        $productPrice = isset($_POST["productPrice"]) ? $_POST["productPrice"] : '';
        $productCode = isset($_POST["productCode"]) ? $_POST["productCode"] : '';
        $productInstock = isset($_POST["productInstock"]) ? ($_POST["productInstock"] === "Yes" ? 1 : 0) : 0;
        $productDiscount = isset($_POST["productDiscount"]) ? $_POST["productDiscount"] : '';
        $productSizes = isset($_POST["productSizes"]) ? $_POST["productSizes"] : '';
        $productDetails = isset($_POST["productDetails"]) ? $_POST["productDetails"] : '';

        // Initialize $targetFile
        $targetFile = "";

        // File upload handling
        if (isset($_FILES["productprofile"]) && !empty($_FILES["productprofile"]["name"])) {
            $targetDir = "uploads/"; // Make sure this directory exists
            $targetFile = $targetDir . basename($_FILES["productprofile"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the image file is an actual image or fake image
            $check = getimagesize($_FILES["productprofile"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["productprofile"]["size"] > 500000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow only certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // If everything is ok, try to upload the file
            } else {
                if (move_uploaded_file($_FILES["productprofile"]["tmp_name"], $targetFile)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["productprofile"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        // Insert data into the database using a prepared statement
        $stmt = $conn->prepare("INSERT INTO product_info (productId, productName, productPrice, productCode, productInstock, productDiscount, productSizes, productDetails, Productprofile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdsisss", $productId, $productName, $productPrice, $productCode, $productInstock, $productDiscount, $productSizes, $productDetails, $targetFile);

        if ($stmt->execute()) {
            $showAlert = "New record created successfully";
        } else {
            $showError = "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Error connecting to the database";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Create New Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <style>
        .create-container {
            padding: 20px;
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: auto;
        }

        .create-form {
            margin-top: 20px;
        }

        .create-form label {
            display: block;
            margin-top: 10px;
        }

        .create-form input,
        .create-form select,
        .create-form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .create-form button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .create-form button:hover {
            background-color: #0056b3;
        }

        footer {
            position: relative;
            width: 100%;
            height: 20%;
            margin-top: 20px;
            background-color: grey;
            overflow: hidden;
        }

        .foot h4 {
            color: white;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell,
                'Open Sans', 'Helvetica Neue', sans-serif;
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
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> ' . $showAlert . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> ' . $showError . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>
    <div class="create-container">
        <h2>Create a New Product</h2>

        <form class="create-form" action="create.php" method="post" enctype="multipart/form-data">
            <label for="productprofile">Product Image:</label>
            <input type="file" name="productprofile" id="productprofile" required>

            <label for="productId">Product ID:</label>
            <input type="number" name="productId" id="productId" required>

            <label for="productName">Product Name:</label>
            <input type="text" name="productName" id="productName" required>

            <label for="productPrice">Product Price:</label>
            <input type="number" name="productPrice" id="productPrice" required>

            <label for="productCode">Product Code:</label>
            <input type="text" name="productCode" id="productCode" required>

            <label for="productInstock">Product In Stock:</label>
            <select name="productInstock" id="productInstock" required>
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>

            <label for="productDiscount">Product Discount:</label>
            <input type="number" name="productDiscount" id="productDiscount" required>

            <label for="productSizes">Product Sizes:</label>
            <input type="text" name="productSizes" id="productSizes" required>

            <label for="productDetails">Product Details:</label>
            <textarea name="productDetails" id="productDetails" rows="5" required></textarea>

            <br>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

   <?php require 'partials/footer.php'?>
</body>

</html>