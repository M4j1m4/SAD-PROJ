<!DOCTYPE html>
<html>
  <title>Clark Lane Bicycle Center</title>
  <head>
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap" rel="stylesheet">
          <script src="https://kit.fontawesome.com/179c54bbd3.js"></script>

          <link rel="stylesheet" href="LogIn.css">
  </head> 
  <body>
    <form action="LogLogic.php" method="post">
      <?php if(isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="log-in-page">
        <div>
          <img class="clark-lane-logo" src="/img/clarklane.png" alt="ClarkLane Logo">
        </div>
        <div class="log-in">
          <div class="welcome-text">
            <p>
              Welcome Back!
            </p>
          </div>
          <div class="username">
            <p style="margin-bottom: 10px">
              Username
            </p>
            <input class="user-box" type="text" name="uname">  
          </div>
          <div class="password">
            <p style="margin-bottom: 10px">
              Password
            </p>
            <span class="eye" onclick="myFunction()"> 
              <input class="pass-box" type="password" id="myInput" name="password"> 
              <i id="hide1" class="fa-solid fa-eye"></i> 
            <i id="hide2" class="fa-solid fa-eye-slash"></i>
            </span>
            
          </div>
          <div>
            <button class="log-in-button">
              Log In
            </button>
          </div> 
        </div>      
      </div>
    </form>

      <script>
        function myFunction(){
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if(x.type === 'password'){
              x.type = "text";
              y.style.display = "block";
              z.style.display = "none";
            }
            else{
              x.type = "password";
              y.style.display = "none";
              z.style.display = "block";
            }
        }
      </script>



  </body>
</html>