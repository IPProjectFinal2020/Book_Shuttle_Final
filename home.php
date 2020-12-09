<?php
session_start();
require_once "pdo.php";
include "sellbook.php";
include "deleteBook.php";

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Book Shuttle</title>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/home.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <!-- jQuery library -->
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <script src="Javascript/index.js"></script>
        <style> 
        .card {
    background-color:#f2f2f2 ;
    border: medium;
    border-radius: 1.2px;
    transition: 0.7s;
        }
        .card :hover{

            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.7);
            transform: translateY(-10px);


        }
        
        </style>
    </head>

    <body>
        <?php 
        if(isset($_SESSION['uname'])){
            echo('
        <nav class="navbar navbar-light navbar-expand-sm fixed-top bg-light w-100">
            <div class="container p-2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto" href="#"><b style="color:rgb(224, 193, 20); "> BOOK</b>SHUTTLE </a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="active"> <a class="nav-link" href="#">Home </a></li>
                        <li class="dropdown"> 
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Books </a>

                            <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown1">
                                <form class="px-2" method="post" action="deleteBook.php">
                                    <table>
                                        <tr class="form-group form-row">
                                            <td class="col-12 col-md-6">
                                                <label for="uname">UserName: </label>
                                            </td>
                                            <td class="col-6 col-md-12">
                                                <input type="text" name="uname" id="uname" placeholder="Enter your user name" required>
                                            </td>
                                        </tr>
                                        <tr class="form-group form-row">
                                            <td class="col-12 col-md-6">
                                                <label for="bookname">Bookname: </label>
                                            </td>
                                            <td class="col-6 col-md-12">
                                                <input type="text" name="bookname" id="bookname" placeholder="Enter the book name" required>
                                            </td>
                                        </tr>
                                        <tr class="form-group form-row">
                                            <td>
                                                <input type="submit" value="Delete" name="delete" class="btn btn-success m-1">
                                                <input type="reset" class="btn btn-secondary m-1">
                                            </td>
                                            
                                         </tr>
                                    </table>
                                </form>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Hello, '.$_SESSION['uname'].'
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <div class="p-2">
                                    <a class="p-0 dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>');
        }else{
             echo '
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            
            <body>
            
                    <script>
            
                    window.location.href = "./index.php?uploadsucess";  
                </script>
            
            
            </body>
            
            </html>
            ';
        } 
        ?>
        <main class="page-main" id="home">
            <div>
                <div class="text-wrapper">
                    <h1>World's Largest Book Store</h1>
                </div>
                <!-- <div class="text-wrapper p-wrapper">
                        <p>Second Hand Buying And Selling of Used Book.</p>
                    </div> -->
                <div class="text-wrapper p-wrapper">
                    <p>Buy And Sell Used Books In India. Search And Buy Second Hand Books Near You. Post Free Ad To Sell Old Books.  </p>
                </div>
              
                <button id="btn2" data-target="#Sellbooksmodal" data-toggle="modal">Sell Books</button>
            </div>
        </main>
        <br><br>
      
 <div class="dropdown ml-auto my-5 col-5 col-sm-4">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#Science">Science</a>
                    <a class="dropdown-item" href="#Commerce">Commerce</a>
                    <a class="dropdown-item" href="#Arts">Arts</a>
                    <a class="dropdown-item" href="#Engineering">Engineering</a>
                    <a class="dropdown-item" href="#Novels">Novels</a>
                    <a class="dropdown-item" href="#Other">Other</a>
                  </div>
                </div>
        <div class="container" id="buyBooks">
           
            <div class="d-flex flex-row w-100">
                <h3 class="my-3">Science</h3>
               
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Science" ORDER BY id DESC ';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>">
                        </div>
                          <br>
                    </div>
                

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>
</div>
        <div class="container" id="Commerce">
            <div class="d-flex flex-row">
                <h3 class="my-3">Commerce</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Commerce"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                    <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div id="bhavik" class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Arts">
            <div class="d-flex flex-row">
                <h3 class="my-3">Arts</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Arts" ORDER BY id DESC';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Engineering">
            <div class="d-flex flex-row">
                <h3 class="my-3">Engineering</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Engineering"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Novels">
            <div class="d-flex flex-row">
                <h3 class="my-3">Novels</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Novel"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Other">
            <div class="d-flex flex-row">
                <h3 class="my-3">Other</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Other"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>
</div>
        <section class="footer p-2 bg-dark" id="footer" height=400>
            <div class="container p-0">
                <div class="row text-center text-xs-center text-sm-left text-md-center">
                    <div class="col-6 col-sm-4 col-md-4">
                        <h5>Contact Us</h5>
                        <ul class="list-unstyled quick-links" style="color: black;">
                            <b> address:</b>
                            <br>mumbai,malad (west)
                            <br>
                            <b>phone:</b>
                            <br>+915785504695<br>
                            <b>mail:</b><br>
                            bookshuttle@gmail.com
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 order-sm-last">
                        <h5>Quick links</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="#home"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="#buyBooks"><i class="fa fa-angle-double-right"></i>Buy Books</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
        <!--                    <br><br><br>-->
                        <div class="book pt-sm-5" style="font-size: 30px;">
                            <b style="color:rgb(224, 193, 20); ">BOOK</b><b>SHUTTLE</b>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mt-1 mt-sm-5">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="color: black;">
                    <div class="col-12 text-center text-white">
                        <p style="color:black;"> <u>BookShuttle</u> is an online bookstore who sells new, old  books at a very cheap rate. </p>
                        <p class="h6" style="color:black;">© All right Reversed.<a class="text-green ml-2" href="index.html" style="color:black">BOOKSHUTTLE</a></p>
                    </div>
                    <hr>
                </div>
            </div>
        </section> 

        
        <script type="text/javascript">
            $(document).ready(function(){
                
                $('.dropdown-toggle').dropdown();
                
               $('.displayBookInfo').click(function(){
                   var userId = $(this).attr("id");
                   $.ajax({
                       url: "ajaxfile.php",
                       method: 'post',
                       data: {userId:userId},
                       success:function(data){
                           $("#bookDetails").html(data);
                           $('#displayBookModal').modal('show');
                       }
                   });
               });
               });
        </script>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>
<?php
session_start();
require_once "pdo.php";
include "sellbook.php";
include "deleteBook.php";

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Book Shuttle</title>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/home.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <!-- jQuery library -->
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <script src="Javascript/index.js"></script>
        <style> 
        .card {
    background-color:#f2f2f2 ;
    border: medium;
    border-radius: 1.2px;
    transition: 0.7s;
        }
        .card :hover{

            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.7);
            transform: translateY(-10px);


        }
        
        </style>
    </head>

    <body>
        <?php 
        if(isset($_SESSION['uname'])){
            echo('
        <nav class="navbar navbar-light navbar-expand-sm fixed-top bg-light w-100">
            <div class="container p-2">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto" href="#"><b style="color:rgb(224, 193, 20); "> BOOK</b>SHUTTLE </a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="active"> <a class="nav-link" href="#">Home </a></li>
                        <li class="dropdown"> 
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Books </a>

                            <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown1">
                                <form class="px-2" method="post" action="deleteBook.php">
                                    <table>
                                        <tr class="form-group form-row">
                                            <td class="col-12 col-md-6">
                                                <label for="uname">UserName: </label>
                                            </td>
                                            <td class="col-6 col-md-12">
                                                <input type="text" name="uname" id="uname" placeholder="Enter your user name" required>
                                            </td>
                                        </tr>
                                        <tr class="form-group form-row">
                                            <td class="col-12 col-md-6">
                                                <label for="bookname">Bookname: </label>
                                            </td>
                                            <td class="col-6 col-md-12">
                                                <input type="text" name="bookname" id="bookname" placeholder="Enter the book name" required>
                                            </td>
                                        </tr>
                                        <tr class="form-group form-row">
                                            <td>
                                                <input type="submit" value="Delete" name="delete" class="btn btn-success m-1">
                                                <input type="reset" class="btn btn-secondary m-1">
                                            </td>
                                            
                                         </tr>
                                    </table>
                                </form>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Hello, '.$_SESSION['uname'].'
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <div class="p-2">
                                    <a class="p-0 dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>');
        }else{
             echo '
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            
            <body>
            
                    <script>
            
                    window.location.href = "./index.php?uploadsucess";  
                </script>
            
            
            </body>
            
            </html>
            ';
        } 
        ?>
        <main class="page-main" id="home">
            <div>
                <div class="text-wrapper">
                    <h1>World's Largest Book Store</h1>
                </div>
                <!-- <div class="text-wrapper p-wrapper">
                        <p>Second Hand Buying And Selling of Used Book.</p>
                    </div> -->
                <div class="text-wrapper p-wrapper">
                    <p>Buy And Sell Used Books In India. Search And Buy Second Hand Books Near You. Post Free Ad To Sell Old Books.  </p>
                </div>
              
                <button id="btn2" data-target="#Sellbooksmodal" data-toggle="modal">Sell Books</button>
            </div>
        </main>
        <br><br>
      
 <div class="dropdown ml-auto my-5 col-5 col-sm-4">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#Science">Science</a>
                    <a class="dropdown-item" href="#Commerce">Commerce</a>
                    <a class="dropdown-item" href="#Arts">Arts</a>
                    <a class="dropdown-item" href="#Engineering">Engineering</a>
                    <a class="dropdown-item" href="#Novels">Novels</a>
                    <a class="dropdown-item" href="#Other">Other</a>
                  </div>
                </div>
        <div class="container" id="buyBooks">
           
            <div class="d-flex flex-row w-100">
                <h3 class="my-3">Science</h3>
               
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Science" ORDER BY id DESC ';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>">
                        </div>
                          <br>
                    </div>
                

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>
</div>
        <div class="container" id="Commerce">
            <div class="d-flex flex-row">
                <h3 class="my-3">Commerce</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Commerce"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                    <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div id="bhavik" class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Arts">
            <div class="d-flex flex-row">
                <h3 class="my-3">Arts</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Arts" ORDER BY id DESC';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Engineering">
            <div class="d-flex flex-row">
                <h3 class="my-3">Engineering</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Engineering"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Novels">
            <div class="d-flex flex-row">
                <h3 class="my-3">Novels</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Novel"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>

        <div class="container" id="Other">
            <div class="d-flex flex-row">
                <h3 class="my-3">Other</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            WHERE category="Other"';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
                      <br>
                </div>

                <div class="modal fade" id="displayBookModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                            </div>
                            <div class="modal-body" id="bookDetails">

                             </div>
                         </div>
                     </div>
                 </div>
                <?php } ?>
             </div>

         </div>
</div>
        <section class="footer p-2 bg-dark" id="footer" height=400>
            <div class="container p-0">
                <div class="row text-center text-xs-center text-sm-left text-md-center">
                    <div class="col-6 col-sm-4 col-md-4">
                        <h5>Contact Us</h5>
                        <ul class="list-unstyled quick-links" style="color: black;">
                            <b> address:</b>
                            <br>mumbai,malad (west)
                            <br>
                            <b>phone:</b>
                            <br>+915785504695<br>
                            <b>mail:</b><br>
                            bookshuttle@gmail.com
                        </ul>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 order-sm-last">
                        <h5>Quick links</h5>
                        <ul class="list-unstyled quick-links">
                            <li><a href="#home"><i class="fa fa-angle-double-right"></i>Home</a></li>
                            <li><a href="#buyBooks"><i class="fa fa-angle-double-right"></i>Buy Books</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4">
        <!--                    <br><br><br>-->
                        <div class="book pt-sm-5" style="font-size: 30px;">
                            <b style="color:rgb(224, 193, 20); ">BOOK</b><b>SHUTTLE</b>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mt-1 mt-sm-5">
                        <ul class="list-unstyled list-inline social text-center">
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="color: black;">
                    <div class="col-12 text-center text-white">
                        <p style="color:black;"> <u>BookShuttle</u> is an online bookstore who sells new, old  books at a very cheap rate. </p>
                        <p class="h6" style="color:black;">© All right Reversed.<a class="text-green ml-2" href="index.html" style="color:black">BOOKSHUTTLE</a></p>
                    </div>
                    <hr>
                </div>
            </div>
        </section> 

        
        <script type="text/javascript">
            $(document).ready(function(){
                
                $('.dropdown-toggle').dropdown();
                
               $('.displayBookInfo').click(function(){
                   var userId = $(this).attr("id");
                   $.ajax({
                       url: "ajaxfile.php",
                       method: 'post',
                       data: {userId:userId},
                       success:function(data){
                           $("#bookDetails").html(data);
                           $('#displayBookModal').modal('show');
                       }
                   });
               });
               });
        </script>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>
