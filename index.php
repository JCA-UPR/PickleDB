<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pickle DB</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .section {
            width: 45%;
            padding: 20px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9); /* Opaque white background */
        }
        h2 {
            margin-top: 0;
        }
        form {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="section">
            <h2>Enter Brand Information</h2>
            <form id="brandForm" action="insert_brand.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <label for="estYear">Establishment Year:</label>
                <input type="number" id="estYear" name="estYear">
                <label for="country">Country:</label>
                <input type="text" id="country" name="country">
                <label for="ceo">CEO:</label>
                <input type="text" id="ceo" name="ceo">
                <input type="submit" value="Submit" onclick="insertBrand()">
            </form>
            <div id="brand_response"></div>
        </section>

        <section class="section">
            <h2>Brands Table</h2>
            <?php include 'insert_brand.php'; ?>
        </section>
    </div>

    <div class="container">
        <section class="section">
            <h2>Enter Series Information</h2>
            <form id="seriesForm" action="insert_series.php" method="post">
                <label for="series_name">Name:</label>
                <input type="text" id="series_name" name="series_name">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description">
                <label for="brand_name">Brand:</label>
                <input type="text" id="brand_name" name="brand_name">
                <input type="submit" value="Submit" onclick="insertSeries()">
            </form>
            <div id="series_response"></div>
        </section>

        <section class="section">
            <h2>Series Table</h2>
            <?php include 'insert_series.php'; ?>
        </section>
    </div>

    <div class="container">
        <section class="section">
            <h2>Enter Paddle Information</h2>
            <form id="paddleForm" action="insert_paddle.php" method="post">
                <!-- Paddle form inputs -->
                <input type="submit" value="Submit" onclick="insertPaddle()">
            </form>
            <div id="paddle_response"></div>
        </section>

        <section class="section">
            <h2>Paddle Table</h2>
            <?php include 'insert_paddle.php'; ?>
        </section>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
