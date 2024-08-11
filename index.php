<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>

<body style="background-color: #f5f5f6;">

    <main>
        <center>
            <div class="container mt-5 p-3">
                <h2>Invoice Generator</h2>
                <form class="row p-3 mt-4" id="myForm">
                    <div class="col">
                        <select name="item" id="item" class="form-control">
                            <option value="0" class="form-control">Select an item</option>
                            <?php
                            include 'conn.php';
                            $sql = "SELECT name FROM products";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['name'] . "' class='form-control'>" . $row['name'] . "</option>";
                            }


                            $sql = "SELECT num FROM invoice_numbers ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $row['num'] + 1;
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <input type="number" name="price" id="price" class="form-control" readonly>
                    </div>
                    <div class="col">
                        <input type="number" name="quantity" id="quantity" class="form-control">
                    </div>
                    <div class="col">
                        <input type="number" name="amount" id="amount" class="form-control" readonly>
                    </div>
                    <div class="col-2">
                        <input type="button" id="addrow" class="btn btn-primary w-50" value="ADD">
                    </div>
                </form>
            </div>

            <!-- display the added data here -->
            <div class="container m-5 p-4">
                <form action="submit.php" method="post" class="form-group">
                    <div class="row mb-3">
                        <div class="col-3">
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        </div>

                        <div class="col-2">
                                <input type="text" name="num" id="num" value="<?php echo $row['num'] + 1; ?>" class="form-control" style="display: none;">
                                <input type="text" name="invoice" id="invoice" class="form-control" readonly>
                        </div>
                    </div>

                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>sl no</th>
                                <th>name</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>

                    <div class="form-group">
                        <button>Submit</button>
                    </div>
                </form>
            </div>
    </main>

    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="add_script.js"></script>
</body>

</html>