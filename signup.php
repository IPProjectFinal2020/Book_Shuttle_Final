<?php
session_start();
require_once "pdo.php";

if (isset($_POST['Uname'])&&isset($_POST['city'])&&isset($_POST['pass'])){
    
    $stmnt = $pdo->prepare("SELECT * from id15556136_signup.signup WHERE uname=:uname");
    $stmnt->execute(array(
        ':uname'=>$_POST['Uname']
    ));
    $result = $stmnt->fetchAll();
    if (!empty($result) ) {
        $message='Username already taken';
        echo($message);
        } 
    else { $message='User added'; 
            $sql = "INSERT INTO id15556136_signup.signup(uname, password, city) VALUES (:uname, :password, :city)";
            $stmnt = $pdo->prepare($sql);
            $stmnt->execute(array(
                ':uname'=>$_POST['Uname'],
                ':password'=>$_POST['pass'],
                ':city'=>$_POST['city']
            ));
            echo '
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            
            <body>
            
                <script>
            
                    window.location.href = "./index.php";  
                </script>
            
            
            </body>
            
            </html>
            ';
               }  
}
else if(isset($_POST['login'])){
    $stmnt = $pdo->prepare("SELECT * from id15556136_signup.signup WHERE uname=:uname and password=:pass");
    $stmnt->execute(array(
        ':uname'=>$_POST['username'],
        ':pass'=>$_POST['password']
    ));
    $result = $stmnt->fetchAll(); 
    if (empty($result)){
        echo '
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>
   <body>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <script>
           swal({
             title: "Incorrect Login Details!",

             icon: "warning",
             button: "Click here !",
           }).then((isSubmit) => {
            if (isSubmit) {
                window.location.href = "./index.php";
            }
          });   
    </script>

     
   </body>
   </html>
   ';
//        $_SESSION['error']="Incorrect uc=sername/password";
    }
    else{
            $_SESSION['uname']=$_POST['username'];
           echo '
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            
            <body>
            
                <script>
            
                    window.location.href = "./home.php";  
                </script>
            
            
            </body>
            
            </html>
            ';
        }
}
