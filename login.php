<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<body>
        <h1>Log In</h1>
        <?php
            if (isset($_GET["error"])){
                if($_GET["error"] == "incorrectcreds"){
                    echo "<h3>We are sorry, but we couldn't find that combination in our database.</h3>";
                }
            }
        ?>
        <form class="logincontent" method="post">
            <br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <input class="formcontent" type="password" name="password" placeholder="Password"><br><br><br><br>
            <button class = "buttonC loginbutton" value="submit" class = "button" name="login-submit">Log In</button><br><br><br>
        </form>
        <button class = "buttonC loginbutton" onclick="window.location.href='signup.php'">No account? Sign up here.</button><br>
        
        <?php
            include "connecting.php";
            if (isset($_SESSION["loggedin"])){
                if ($_SESSION["loggedin"] == true){
                    header("Location: logout.php");
                }
            }
            //Initialize the Database
            $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
            if($mySQLI->connect_error){
                die("Connection Failed." . $mySQLI->connect_error);
            }
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST['login-submit'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
                    $result = mysqli_query($mySQLI, $sql);
                    $count = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    if($count > 0){
                        $_SESSION["loggedin"] = true;
                        $_SESSION["customerid"] = $customerid;
                        $_SESSION["email"] = $email; 
                        $_SESSION["password"] = $password;
                        $_SESSION["loggedout"]  = false;
                        $_SESSION["deleted"] = false;
                        $_SESSION['email'] = $row["email"];
                        header("Location: storee.php");
                    }else{
                        header("Location: login.php?error=incorrectcreds");
                    }
                }
            }
            $mySQLI->close();
        ?>
    </div>
</body>
</html>
