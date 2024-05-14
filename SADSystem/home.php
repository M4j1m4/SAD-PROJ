<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include 'header.php';
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>FRONTPAGE</title>
            <link rel="stylesheet" href="styles.css">
        </head> 
        <body>  
            <div class="background">
                <div>
                <div class="box">
                    <div class="bike-container">
                    <img class="bike" src="/img/3.png" alt="bike">
                    <img class="bike2" src="/img/3.png" alt="bike">
                    <img class="bike3" src="/img/3.png" alt="bike">
                    </div>
                    <img class="company-contacts" src="/img/2.jpg" alt="company-contacts">
                </div>
                </div>
            </div>
        </body>
    </html>

    <?php
}
else {
    header("Location: LogIn.php");
    exit();
} 
?>