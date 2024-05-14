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
                <button class="button">SUPPLIERS</button>
                <button class="button">STOCKS REPORT</button>
                <button class="button">SALES REPORT</button>
            </div>
        </div>
        <div class="admin-button-container">
            <button class="admin-button">ADMIN &#9660;</button>
            <button class="signout-button">SIGN OUT</button>
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
                    <button class="button">SUPPLIERS</button>
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
                <a class="btn btn-primary" href="/SAISystem/createSupplier.php" role="button">New Supplier</a>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>PRODUCT</th>
                            <th>CONTACT NUMBER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername= "localhost";
                        $username="root";
                        $password="";
                        $database="clbc_suppliers";

                        $connection = new mysqli($servername, $username, $password, $database);

                        if ($connection-> connect_error) {
                            die("Connection failed:" . $connection-> connect_error);
                        }
                        
                        $sql = "SELECT * from supplier_data";
                        $result = $connection->query($sql);

                        if(!$result){
                            die("Invalid Query:" . $connection->error);
                        }

                        while($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[product]</td>
                                <td>$row[contactInfo]</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='/SAISystem/editSupplier.php?id=$row[id]'>EDIT</a>
                                    <a class='btn btn-danger btn-sm' href='/SAISystem/deleteSupplier.php?id=$row[id]'>DELETE</a>
                                </td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table> 
            </div>
    </div>

    <br>
    <button onclick="addRow()">Add Supplier</button>
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

        function addRow() {
        var table = document.getElementById("sales-contacts");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
  
        
        cell1.innerHTML = "<input type='text' placeholder='Company Name'>";
        cell2.innerHTML = "<input type='text' placeholder='Product Name'>";
        cell3.innerHTML = "<input type='text' placeholder='Company Address'>";
      }
    </script>

    