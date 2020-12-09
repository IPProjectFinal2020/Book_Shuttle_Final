<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
        <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            *{
                font: 16px/1.5 "Playfair Display", sans-serif;
            }
        </style>
    </head>
<?php

if(isset($_POST["userId"])){
    
    require_once "pdo.php";
    $response = "";
    $sql = "SELECT * FROM id15556136_signup.sellbooks WHERE id='".$_POST["userId"]."'"; 
    $stmnt = $pdo->query($sql);
    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
    $response.='<div class="container m-0 p-0">';
    while ($row = $stmnt->fetch()){
        $id = $row['id'];
        $bookname = $row['bookname'];
        $category = $row['category'];
        $sellingprice = $row['sellingprice'];
        $bookcondition = $row['bookcondition'];
        $contactno = $row['contactno'];
        $description = $row['description'];
        $img_dir = $row['img_dir'];

        $response.='<div class="row"><div class="col-12 col-md-5">
        <img src="'.$img_dir.'" height="250" width="200" style="object-fit: contian"></div>
        <div class="col-md-1"></div><div class="col-12 col-md-6"><table border=0 height="250px" cellpadding="3"><td>Book: </td><td>'.$bookname.'</td>
        </tr>

        <tr>
        <td>Category: </td><td>'.$category.'</td>
        </tr>

        <tr>
        <td>Selling Price: </td><td>'.$sellingprice.'/-</td>
        </tr>
        
        <tr>
        <td>Contact: </td><td>'.$contactno.'</td>
        </tr>

        <tr>
        <td>Condition: </td><td>'.$bookcondition.'</td>
        </tr>

        <tr colspan="2">
        <td>'.$description.'</td>
        </tr></table></div></div>';
        
    }
    $response.='</div>';
    echo $response;
}
?>
</html>
