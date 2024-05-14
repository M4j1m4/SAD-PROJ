<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>  
    <div class="horizontal-container">  
        <div class="white-container">
            <button class="button"><a href="/SAISystem/supplier.php">SUPPLIERS</a></button>
            <button class="button"><a href="/SAISystem/stockreport.php">STOCKS REPORT</a></button>
            <button class="button">SALES REPORT</button>
        </div>
    </div>
    <div class="admin-button-container">
        <button class="admin-button">ADMIN &#9660;</button>
        <button class="signout-button"><a href="logout.php" class="none1">SIGN OUT</a></button>
    </div>
    <div class="vertical-container">
        <div class="circle-container">
            <img src="/img/1.png" alt="ClarkLane Logo">
        </div>
        <div class="button-container">  
            <div class="home-button-container">
                <img src="/img/5.jpg" alt="Home Icon" class="home-icon">
                <button class="button">HOME</button>
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
                <button class="button"><a href="/SAISystem/stockreport.php" class="none">STOCKS REPORT</a></button>
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
            <h1>SALES AND INVENTORY SYSTEM</h1>
            <a class="btn btn-primary" href="/SAISystem/createInventory.php" role="button">NEW ITEM</a>
            <br>
            <!-- Search Form -->
            <form action="home.php" method="GET" class="mt-3 mb-3"> 
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ID/category/product" name="search">
                    <button class="btn btn-primary" role="button" type="submit">Search</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CATEGORY</th>
                        <th>PRODUCT</th>
                        <th>STOCKS</th>
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
                    
                    // Check if a search query is submitted
                    if(isset($_GET['search'])) {
                        $search = $_GET['search'];
                        // Query to search for the input in ID, category, or product
                        $sql = "SELECT * FROM inventory_data WHERE id LIKE '%$search%' OR category LIKE '%$search%' OR product_name LIKE '%$search%'";
                    } else {
                        // Default query to fetch all data
                        $sql = "SELECT * FROM inventory_data";
                    }

                    $result = $connection->query($sql);

                    if(!$result){
                        die("Invalid Query:" . $connection->error);
                    }

                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[category]</td>
                            <td>$row[product_name]</td>
                            <td>$row[stocks]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/SAISystem/editInventory.php?id=$row[id]'>EDIT</a>
                                <a class='btn btn-danger btn-sm' href='/SAISystem/deleteInventory.php?id=$row[id]'>DELETE</a>
                            </td>
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
