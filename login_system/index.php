<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

   <h1>Test System!</h1>
   <label>Enter the Username:</label><br>
   <input type="text" name="username" id="" width:> <br>
   <label>Enter the Password:<label> <br>
   <input type="password" name="password"> <br> <br>
   <button type="submit">Submit</button>
   <button type="reset">Reset</button>

</body>
</html>

<?php
include("database.php");
?>

<?php<

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
     $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

     if(empty($username)){
        echo"Please Enter a Username...";
     }

     else if(empty($password)){
        echo"Please Enter a Password...";
}

else{
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (user, password) VALUES ('$username', '$hash')";
}
}

try{
    mysqli_query($conn, $sql);
    echo "You are registered.";
}
catch(mysqli_sql_exception){
    echo "That username is taken.";
}

mysqli_close($conn);
?>
