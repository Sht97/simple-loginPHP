<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>
<body>
    <div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <i class="bi bi-person-circle"></i>
        <!-- Icon -->
        <div class="fadeIn first">
            <svg xmlns="http://www.w3.org/2000/svg" width="106" height="106" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>        </div>

        <!-- Login Form -->
        <form method="post">
            <input type="email" id="login" class="fadeIn second" name="email" placeholder="login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" name="btningresar" class="fadeIn fourth" value="Log In">
        </form>

    </div>
</div>
</body>
</html>
<?php

session_start();
if(isset($_SESSION['nombredelusuario']))
{
    header('location: pagina.php');
}

if(isset($_POST['btningresar']))
{

    $dbhost="sql10.freemysqlhosting.net";
    $dbuser="sql10399877";
    $dbpass="XdU6Lpa7ZK";
    $dbname="sql10399877";

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$conn)
    {
        die("No hay conexión: ".mysqli_connect_error());
    }

    $email=$_POST['email'];
    $pass=$_POST['password'];

    $query=mysqli_query($conn,"Select * from users where email = '".$email."' and password = '".$pass."'");
    $nr=mysqli_num_rows($query);

    if(!isset($_SESSION['nombredelusuario']))
    {
        if($nr == 1)
        {
            $_SESSION['nombredelusuario']=$email;
            header("location: home.php");
        }
        else if ($nr == 0)
        {
            echo "<script>alert('Usuario no existe');window.location= 'index.php' </script>";
        }
    }
}
?>


