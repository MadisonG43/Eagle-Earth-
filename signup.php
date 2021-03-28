<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<body>
    <!--Code for the main content-->
        <h1>Sign Up</h1>
        <h5>
        <?php
            //Create variables for the Users Name, UserID, Email
            $firstname = "";
            $lastname = "";
            $email = "";
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            //Check if there are any errors regarding the form fields
            if(strpos($url, 'error')){
                //Check if the UserID is valid
                if($_GET['error']=="invaliduid"){
                    echo("Invalid Username");
                    if(strpos($url, 'email')){
                        $mail = $_GET['email'];
                    }
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                }
                //Check if there are any empty fields
                if($_GET['error'] == "emptyfields"){
                    echo("You still have empty fields.");
                    if(strpos($url, 'email')){
                        $mail = $_GET['email'];
                    }
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                }
                //Check if the email is valid
                if($_GET['error'] == "invalidemail"){
                    echo("Invalid email.");
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                }
                //Check if the passwords match
                if($_GET['error'] == "passwordcheck"){
                    echo("Passwords do not match.");
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                    if(strpos($url, 'email')){
                        $mail = $_GET['email'];
                    }
                }
                //Check if the UserID is taken
                if($_GET['error'] == "uidtaken"){
                    echo("That username is taken.");
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                    if(strpos($url, 'email')){
                        $mail = $_GET['email'];
                    }
                }
                //Check if there was an error with the SQL
                if($_GET['error'] == "sqlerror"){
                    echo("There was an error, please try again.");
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                    if(strpos($url, 'email')){
                        $mail = $_GET['email'];
                    }
                }
                //Check if the email is taken
                if($_GET['error'] == "emailtaken"){
                    echo("That email is taken.");
                    if(strpos($url, 'firstname')){
                        $fname = $_GET['firstname'];
                    }
                    if(strpos($url, 'lastname')){
                        $lname = $_GET['lastname'];
                    }
                    if(strpos($url, 'uid')){
                        $uid = $_GET['uid'];
                    }
                }
            }
        ?>
        <!--Signup form-->
        
        </h5>
        
        <form action="signup.php"  class="logincontent" method="post">
            <br>
            <input type="text" placeholder="First Name" name="firstname" value="<?php echo($firstname);?>"><br><br>
            <input type="text" placeholder="Last Name" name="lastname" value="<?php echo($lastname);?>"><br><br>
            <input type="text" placeholder="Email" name="email" value="<?php echo($email);?>"><br><br>
            <input type="password" placeholder="Password" name="password"><br><br>
            <input type="password" placeholder="Repeat Password" name="repeat-pwd"><br><br><br><br>
            <button class="buttonC loginbutton" value="submit" class = "button" name="signup-submit">Sign Up</button><br>
        </form>
       
        <!--PHP for inserting the filled out form into the database if there are no errors-->
       <?php
            //create variables for starting the server
            $servername = "localhost:3306";
            $db_username = "cchs_mgranger";
            $db_password = "eagles";
            $db_database = "cchs_mgranger";
            //Initialize the Database
            $mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
            //detect if there is an error connecting to the database
            if($mySQLI->connect_error){
                header("location: signup.php?error=connecterror");
                die("Error connecting to server: " . $mySQLI->connect_error);
            }
            //Detect if the signup button is pressed
            if(isset($_POST['signup-submit'])){
                //Create variables from the filled out form
                $username = $_POST['username'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $pwdrepeat = $_POST['repeat-pwd'];
                
                //Detect any errors in the filled out form
                //Detect if any of the fields are empty
                if(empty($firstname) || empty($lastname) || empty($mail) || empty($password) || empty($pwdrepeat)){
                    header("Location: signup.php?error=emptyfields&email=".$email."&fname=".$firstname."&lname=".$lastname);
                    exit();
                }
                //Detect if the email and username are correct
                else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: signup.php?error=invaliduidemail");
                }
                //Detect if the email is valid
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: signup.php?error=invalidemail&firstname=".$firstname."&lastname=".$lastname);
                    exit();
                }
                //Detect if the Username is valid
                else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    header("Location: signup.php?error=invaliduid&email=".$email."&firstfname=".$firstname."&lastname=".$lastname);
                    exit();
                }
                //Detect if the two passwords match
                else if($password !== $pwdrepeat){
                    header("Location: signup.php?error=passwordcheck&email=".$email."&firstname=".$firstname."&lastname=".$lastname);
                    exit();
                }
                //Insert the form into the database if there were no errors
                else{
                    //Detect if the username is available
                    //Detect if the SQL was able to contact the database
                    if($mySQLI->connect_error){
                        header("Location: signup.php?error=sqlerror&email=".$email."&firstname=".$firstname."&lastname=".$lastname);
                        exit();
                    }
                    //If it was able to connect, run the code for checking the username
                    else{
                        $user_check_query = "SELECT firstname FROM customers WHERE firstname='$firstname'";
                        $result = mysqli_query($mySQLI, $user_check_query);
                        $email_check = "SELECT email FROM customers WHERE email='$email'";
                        $res = mysqli_query($mySQLI, $email_check);
                        if(mysqli_num_rows($res) == 1){
                            header("Location: signup.php?error=emailtaken&firstname=".$firstname."&lastname=".$lastname);
                        }else if(mysqli_num_rows($result) == 1){
                            header("Location: signup.php?error=uidtaken&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
                        }else{
                            $sql = "INSERT INTO customers (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$mail', '$password');";
                            echo mysqli_query($mySQLI, $sql);
                            $mySQLI->close();
                            header("Location: storee.php?signup=success");
                        }
                    }
                }
            }
            $mySQLI->close();
        ?>
    </div>
    <style>
    .button{
  background-color:lightgreen; 
  color:black;
  border-radius: 1vw 1vw;
  font-size: 2vw;
  padding: 0vw .5vw;
  cursor:pointer;
 }

 .buttonC {
  margin-left: 40%;
  margin-right: 40%;
  background-color: #FFF;
  padding: 10px 20px;
  border-radius: 3px;
  border: 2px solid #000;
  transition: 0.3s;
}
.buttonC:hover {
  cursor: pointer;
  box-shadow: 0px 1px 3px #555;
  border: 2px solid #000;
}
</style>
    <br>
</body>
</html>
