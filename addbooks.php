<?php
require_once('pdo.php');



$bookname=$category=$pdate=$sprice=$bcondn=$contactno=$descr=$img_dir=$status='';

$newname='';
if (isset($_POST['submit'])){
    
    $username = test_input($_POST['username']);
    $bookname = test_input($_POST['bookname']);
    $category = test_input($_POST['category']);
    $sprice = test_input($_POST['price']);
    $bcondn = test_input($_POST['bcondn']);
    $contactno = test_input($_POST['contactno']);
    $descr = test_input($_POST['description']);
        
            $target= 'bookImageUploads/';
            $file_name= $_FILES['bookimage']['name'];
            $file_type= $_FILES['bookimage']['type'];
            $file_size= $_FILES['bookimage']['size'];
            $tmp_name = $_FILES['bookimage']['tmp_name']; //to store in server tmp_name(temporarily store the value in server)

            $allowed = array('jpg' => 'image/jpg','jpeg' => 'image/jpeg','png' => 'image/png');


            if(!in_array($file_type, $allowed)){

                $file_error="Please select jpg/jpeg/png file";
            }
            
            $maxsize =1*1024*1024;
            if ($file_size > $maxsize) {
                $file_error ="File is greater than 1MB";
            }

            if (in_array($file_type,$allowed) && ($file_size < $maxsize) && $_FILES['bookimage']['error']==0) {


                $newname = rand().$file_name;
                $target= $target.$newname;
                $image = $target;
                    move_uploaded_file($tmp_name,$target);

            }
            else{
                 $file_error="Error Occured";
             }
    
            $sql = "INSERT INTO id15556136_signup.sellbooks(`username`,`bookname`, `category`, `sellingprice`, `bookcondition`, `contactno`, `description`, `img_dir`) VALUES ('$username','$bookname','$category','$sprice','$bcondn','$contactno','$descr','$image')";

        $stmnt = $pdo->prepare($sql);

        $stmnt->execute(array(
          $username, $bookname, $category, $sprice, $bcondn, $contactno, $descr, $image
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
            
                    window.location.href = "./home.php?uploadsucess";  
                </script>
            
            
            </body>
            
            </html>
            ';
    
}
    
          

function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
 }
    
 ?>
