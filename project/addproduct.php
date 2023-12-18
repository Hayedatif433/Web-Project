<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Table Styles */
        .product-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .product-table th,
        .product-table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        .product-table th {
            background-color: #f2f2f2;
        }

        .product-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .product-table img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        /* Additional Styles */
        h2 {
            margin-top: 30px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        footer {
            margin-top: auto;
            position: relative;
            width: 100%;
            height: 20%;
            background-color: grey;
            overflow: hidden;
            margin-top: 40px;
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
        .Btn{
            margin-left: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php require 'partials/navbar_v1.php' ?>
    <br>
    <table class="product-table">
        <tr>
            <th>Productprofile</th>
            <th>productId</th>
            <th>productName</th>
            <th>productPrice</th>
            <th>productCode</th>
            <th>productInstock</th>
            <th>productDiscount</th>
            <th>productSizes</th>
            <th>productDetails</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>

        <?php

        require("partials/db_connect.php");

        if ($conn) {
            $sql = "SELECT * FROM product_info";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . $row["productprofile"] . "' alt='" . $row["productName"] . "' width='100px'></td>";
                    echo "<td>" . $row["productId"] . "</td>";
                    echo "<td>" . $row["productName"] . "</td>";
                    echo "<td>" . $row["productPrice"] . "</td>";
                    echo "<td>" . $row["productCode"] . "</td>";
                    echo "<td>" . ($row["productInstock"] == 1 ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . $row["productDiscount"] . "</td>";
                    echo "<td>" . $row["productSizes"] . "</td>";
                    echo "<td>" . $row["productDetails"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row["productId"] . "' class='btn btn-primary'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=" . $row["productId"] . "' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='9'>No products found</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
        } else {
            echo "<tr>";
            echo "<td colspan='9'>no data</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br>

        <h2>Create a New Product</h2>
        <div>
        <!-- Move the form outside the button -->
        <form id="createForm" action="create.php" method="post" enctype="multipart/form-data">
            <!-- Your input fields go here -->
        </form>

        <!-- Create a separate button to open create.php in a new window or tab -->
        <button class="Btn" type="button" onclick="window.open('create.php', '_blank');">Create</button>
    </div>
    </main>
    <?php require'partials/footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('showFormBtn').addEventListener('click', function () {
            document.getElementById('createForm').style.display = 'block';
        });
    </script>
</body>

</html>