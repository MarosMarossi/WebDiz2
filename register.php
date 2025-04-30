<?php
    session_start();
    include("connect.php");

    if(isset($_POST['signUp']))
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        if($user_name == '')
        {
            echo"<script>alert('Prosim zadajte meno')</script>";
            exit();
        }
        if($user_email == '')
        {
            echo"<script>alert('Prosim zadajte email')</script>";
            exit();
        }
        if($user_password == '')
        {
            echo"<script>alert('Prosim zadajte heslo')</script>";
            exit();
        }

        //Here query check weather if user already registered so can't register again
        $check_email_query = "SELECT * FROM users WHERE user_email='$user_email'";
        $result = $conn->query($check_email_query);

        if(mysqli_num_rows($result))
        {
            echo "<script>alert('Email $user_email Už existuje, skúste nový!')</script>";
            exit();
        }

        //Insert the user into the database
        $insert_user = "INSERT INTO users (user_name,user_email,user_pass) VALUES ('$user_name','$user_email','$user_password')";
        if($conn->query($insert_user))
        {
            $_SESSION['email'] = $user_email;   //here session is used and value of $user_email store in $_SESSION.
            //header("Location: /Webdizajn2/index.php");
            echo "<script>window.open('index.php','_self')</script>";
        }
    }

    if(isset($_POST['signIn']))
    {
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        $check_user = "SELECT * FROM users WHERE user_email='$user_email'AND user_pass='$user_password'";
        $result = $conn->query($check_user);

        if(mysqli_num_rows($result))
        {
            $_SESSION['email'] = $user_email;   //here session is used and value of $user_email store in $_SESSION.
            //header("Location: /Webdizajn2/index.php");     
            echo "<script>window.open('index.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Email alebo heslo sú nesprávne!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	
    <link rel="stylesheet" href="scripts/mycss.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <!--REGISTRACIA-->
    <div class="container form_con" id="signUpForm" style="display: none;">
        <h1 class="form-title">Registrácia</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input class="form_inp" type="text" name="name" id="fName" placeholder="Meno" required>
                <label for="fName"><b>Meno</b></label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input class="form_inp" type="email" name="email" id="email" placeholder="Email" required>
                <label for="email"><b>Email</b></label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input class="form_inp" type="password" name="password" id="password" placeholder="Heslo" required>
                <label for="password"><b>Heslo</b></label>
            </div>
            <input type="submit" class="btn custom_button" value="Zaregistrovať sa" name="signUp">
        </form>
        <hr>
        <div class="links">
            <p><b>Už máte účet?</b></p>
            <button id="signInButton">Prihlásiť sa</button>
        </div>
    </div>
    <!--PRIHLASENIE-->
    <div class="container form_con" id="signInForm">
        <h1 class="form-title">Prihlásenie</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input class="form_inp" type="email" name="email" id="email" placeholder="Email" required>
                <label for="email"><b>Email</b></label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input class="form_inp" type="password" name="password" id="password" placeholder="Heslo" required>
                <label for="password"><b>Heslo</b></label>
            </div>
            <!--Zapametaj si ma este neni
            <label>
                <input type="checkbox" name="remember" style="margin-bottom: 15px;"> Zapamätaj si ma
            </label>
            -->
            <br>
            <input type="submit" class="btn custom_button" value="Prihlásiť sa" name="signIn">
            <!--Recover este neni
            <p class="recover">
                <a href="#">Zabudli ste heslo?</a>
            </p>
            -->
        </form>
        <hr>
        <div class="links">
            <p><b>Nemáte účet?</b></p>
            <button id="signUpButton">Registrovať sa</button>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById("signUpButton");
        const signInButton = document.getElementById("signInButton");
        const signUpForm = document.getElementById("signUpForm");
        const signInForm = document.getElementById("signInForm");

        signUpButton.addEventListener("click", function(){
            signInForm.style.display="none";
            signUpForm.style.display="block";
        })

        signInButton.addEventListener("click",function(){
            signInForm.style.display="block";
            signUpForm.style.display="none";
        })

    </script>
</body>
</html>
