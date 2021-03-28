<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" type = "text/css" href = "styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        //Logout the user
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: index.html");
        exit;
    ?>
</body>
</html>
