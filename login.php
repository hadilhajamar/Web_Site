<?php
$servername = "localhost";
$username ="root";
$password="";
$dbname="di";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    echo "Connection Failed". mysqli_connect_error(); 
}
if (isset($_POST) && $_POST !=[]){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $sql="SELECT* FROM users WHERE email='$email' AND password = '$pwd'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        session_start();
        $_SESSION['username']='di';
        header("location: index.html");
    }else{
        $error="Login or Password doesn't exsiste";
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <section id="test_section">
        <div class="left">
            <img src="images/banner.jpg" alt="logo image" width="500" height="500">

        </div>
        <div class="right">
            <form method="POST">

                <h1> Get more thnigs done with loggin platform.</h1>
                <p>Acces to the most powerfull tool in the entire design and web industry.</p><br>
                <label class="ligne">Login</label><br><br>
                <p style="color:red";><?= (isset($error))? $error:""?></p>
                    <input class="inputs" type="email" placeholder="E-mail Address" name="email"/><br>
                    <input class="inputs" type="password" placeholder="Password" name="pwd"/><br>
                    <input id="btn" type="submit" value="login" /> 
                     <a href="#">Forget password?</a>
                     <a href="register.php">Create Account</a>
            </form>
        </div>
    </section>
</body>

</html>