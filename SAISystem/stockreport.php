<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>  
    <div class="horizontal-container">  
        <div class="white-container">
            <button class="button"><a href="/SAISystem/supplier.php">SUPPLIERS</a></button>
            <button class="button">STOCKS REPORT</button>
            <button class="button">SALES REPORT</button>
        </div>
    </div>
    <div class="admin-button-container">
        <button class="admin-button">ADMIN &#9660;</button>
        <button class="signout-button"><a href="logout.php">SIGN OUT</a></button>
    </div>
    <div class="vertical-container">
        <div class="circle-container">
            <img src="/img/1.png" alt="ClarkLane Logo">
        </div>
        <div class="button-container">  
            <div class="home-button-container">
                <img src="/img/5.jpg" alt="Home Icon" class="home-icon">
                <button class="button"><a href="/SAISystem/home.php">HOME</a></button>
            </div>
            <div class="user-button-container">
                <img src="/img/6.jpg" alt="User Icon" class="user-icon">
                <button class="button"><a href="/SAISystem/users.php">USERS</a></button>
            </div>
            <div class="supplier-button-container">
                <img src="/img/6.jpg" alt="Supplier Icon" class="supplier-icon">
                <button class="button"><a href="/SAISystem/supplier.php">SUPPLIERS</a></button>
            </div>
            <div class="stock-button-container">
                <img src="/img/8.jpg" alt="Stocks Icon" class="stock-icon">
                <button class="button">STOCKS REPORT</button>
            </div>
            <div class="sales-button-container">
                <img src="/img/7.jpg" alt="Sales Icon" class="sales-icon">
                <button class="button">SALES REPORT</button>
            </div>
        </div>
        <div class="scroll-to-top-container">
            <button class="scroll-to-top-button">↑</button>
        </div>
    </div>
    <div class="content-container">
        <div class="container my-5">
            <h2>DAILY REPORT<h2>
            <form action="generate_daily_report.php" method="POST">
                <div class="mb-3">
                    <label for="reportDate" class="form-label">Select Date:</label>
                    <input type="date" class="form-control" id="reportDate" name="reportDate" required>
                </div>
                <button type="submit" class="btn btn-primary">Generate Report</button>
            </form>
            <h2>Low Stock Items</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Current Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername= "localhost";
                    $username="root";
                    $password="";
                    $database="clbc_inventory";

                    $connection = new mysqli($servername, $username, $password, $database);

                    if ($connection-> connect_error) {
                        die("Connection failed:" . $connection-> connect_error);
                    }
                    
                    // Query to select products with stock 3 or below
                    $sql = "SELECT product_name, stocks FROM inventory_data WHERE stocks <= 3";
                    $result = $connection->query($sql);

                    if(!$result){
                        die("Invalid Query:" . $connection->error);
                    }

                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>$row[product_name]</td>
                            <td>$row[stocks]</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
</body>
</html>
<script>
    // JavaScript to handle the dropdown menu

    // Get the admin button and the sign-out button
    const adminButton = document.querySelector('.admin-button');
    const signoutButton = document.querySelector('.signout-button');

    // Add an event listener to the admin button
    adminButton.addEventListener('click', () => {
        // Toggle the visibility of the sign-out button
        if (signoutButton.style.display === 'none' || signoutButton.style.display === '') {
            signoutButton.style.display = 'block';
        } else {
            signoutButton.style.display = 'none';
        }
    });

    // Scroll to top button functionality
    const scrollToTopButton = document.querySelector('.scroll-to-top-button');

    scrollToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
