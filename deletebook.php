<?php

require_once "pdo.php";

$error = "";

if(isset($_POST['delete'])){
    
    $username = $_POST['uname'];
    $bookname = $_POST['bookname'];
    
    $stmnt = $pdo->prepare("SELECT * from id15556136_signup.sellbooks WHERE username='$username' and bookname='$bookname'");
    $stmnt->execute(array(
        $username, $bookname
    ));
    $result = $stmnt->fetchAll();
    if (empty($result)) {
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
             title: "Incorrect Details",

             icon: "warning",
             button: "Click here !",
           }).then((isSubmit) => {
            if (isSubmit) {
                window.location.href = "./home.php";
            }
          });   
    </script>

     
   </body>
   </html>
   ';
    }
    else{
        $sql = ("DELETE FROM id15556136_signup.sellbooks WHERE username='$username' and bookname='$bookname'");

          // use exec() because no results are returned
          $pdo->exec($sql);
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
?>
