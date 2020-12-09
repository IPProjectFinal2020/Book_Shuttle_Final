<?php
include "SignUp.html";
include "Login.php";
require_once "pdo.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/aboutus.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/footer.css'>
     <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/c24a3b05a2.js"></script>
    <script src='Javascript/index.js'></script>
<style>
    .about-images{
                 width: 50px;
                height: 50px;
                border: 1.6px solid black; 
                position: relative;
                transform: scale(1.7);
                padding: 0.5
            }
            
            .img-gallery:hover{
                cursor: pointer;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3);
                transform: translateY(-20px);
            }
</style>

</head>

<body>
<!--    <div class="wrapper">-->
       <nav class="navbar navbar-light navbar-expand-sm fixed-top bg-light">
		<div class="container p-2">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand mr-auto" href="#"><b style="color:rgb(224, 193, 20); "> BOOK</b> SHUTTLE </a>
			<div class="collapse navbar-collapse" id="Navbar">
				<ul class="navbar-nav ml-auto">
                <li class="nav-item active px-2"> <a href="" style="color:black; text-decoration: none;"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a></li>
<li class="nav-item px-2"> <a href="#footer" style="color:black; text-decoration: none;"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Contact</a></li>
<li class="nav-item px-2">
    <a href="#aboutus" style="color:black; text-decoration: none;"><i class="fa fa-info" aria-hidden="true"></i>&nbsp;About</a>
</li>
				</ul>
			</div>
		</div>
	</nav>

        <main class="page-main" id="home">
            <div>
                <div class="text-wrapper">
                    <h1>World's Largest Book Store</h1>
                </div>
                <!-- <div class="text-wrapper p-wrapper">
                        <p>Second Hand Buying And Selling of Used Book.</p>
                    </div> -->
                <div class="text-wrapper p-wrapper">
                    <p style="color: white">Buy And Sell Used Books In India. Search And Buy Second Hand Books Near You. Post Free Ad To Sell Old Books In City. Download the app now. </p>
                </div>
                <div class="header-button">
                    <button  id="btn1" href="#" data-toggle="modal" data-target="#loginModal">Login</button>
                    <button  id="btn2" href="#" data-toggle="modal" data-target="#signupModal">Sign Up</button>
                </div>
            </div>
        </main>
        <div class="container headings text-center" id="howTo">
                <div class="cards"> <br><br><br><br><br><br><br>
            <h3 >How To Buy AND Sell Used Books On Book Shuttle?</h3>
           
         <p class="text-center">Variety of Books Can Buy And Sell among thousand of People.</p>
        </div>   
        </div>
        <section class="header-extradiv">
            <div class="container">
                <div class="row">
                    <div class=" extra-div col-lg-3 col-md-4 col-12">
                        <a href="#"><i class="fa-3x fa fa-user-circle" aria-hidden="true" style="color:black"></i></a>
                        <h2>Register Here</h2>
                        <p>User Can generate a Unique Id and Password to log into Our Website..</p>
                    </div>
        
                    <div class=" extra-div col-lg-3 col-md-4 col-12">
                        <a href="#"><i class="fa-3x fa fa-sign-in" aria-hidden="true" style="color:black"></i></a>
                        <h2>Login</h2>
                        <p>It contain number of Books User wants to sell or buy</p>
                    </div>
        
                    <div class=" extra-div col-lg-3 col-md-4 col-12">
                        <a href="#"><i class="fa-3x fa fa-book" aria-hidden="true" style="color:black"></i></a>
                        <h2>Buy Books</h2>
                        <p>It Keeps track of order books  </p>
                    </div>
                    <div class=" extra-div col-lg-3 col-md-4 col-12">
                        <a href="#"><i class="fa-3x fa fa-book" aria-hidden="true" style="color:black"></i></a>
                        <h2>Sell Books</h2>
                        <p>It Keeps track of order books  </p>
                    </div>

                   
        
                </div>
            </div>
        </section>
         <div class="container" id="Engineering">
            <div class="d-flex flex-row">
                <h3 class="my-3">Recently Added</h3>
            </div>

            <div class="row row-content">
                <?php
                    $sql = 'SELECT *
                            FROM id15556136_signup.sellbooks
                            ORDER BY id DESC LIMIT 4';
                    $stmnt = $pdo->query($sql);
                    $stmnt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmnt->fetch())
                    {
                        $id = $row['id'];
                        $img_dir = $row['img_dir'];
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card p-2 p-lg-1" style="border: 1px solid gray">
                        <img class="img-gallery p-1 displayBookInfo " height="250px" src="<?php echo $img_dir; ?>" id="<?php echo $id; ?>"> 
                    </div>
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
    
        <div class="aboutus-section" id="aboutus" >
            <div class="container py-3" >
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="aboutus">
                            <h2 class="aboutus-title">About Us !</h2>
                            <p class="aboutus-text">Ever wanted to buy a book but could not because it was too expensive? worry not! because Bookshuttle is here! Bookshuttle team is committed to bring to you all kinds of best books at the minimal prices ever seen anywhere. Yes, we are literally giving you away a steal.</p>
                            <p class="aboutus-text">We are here to help you sell your used books online. 
Our process is super simple, all you need to do is create a seller login with your username and password. Once your account has been created, go to sell books , simply upload the details of your books, the photos and the segment it belongs to.</p>
                            <a class="aboutus-more" href="#">read more</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="aboutus-banner">
                        
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12 align-items-center my-4">
                   <h2 class="aboutus-title"> OUR TEAM </h2>
                        <div class="feature">
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="feature-content d-flex flex-row mb-5 align-items-center">
                                        <div class="align-items-center">
                                            <img class="rounded-circle overflow-hidden about-images mr-5 my-3" src="CSS/bhavik.jpeg" style="transform: scale(1.5)">
                                        </div>
                                        <div class="mt-3">
                                            <h4><b>BHAVIK JAIN</b></h4>
                                            <p style="font-size: 15px"><a href="https://www.facebook.com/bhavik.jain.127648"><i id="social" class="fa fa-facebook p-1"></i></a><a href="https://twitter.com/Bhavik17985124?s=08"><i id="social" class="fa fa-twitter p-1"></i></a><a href="https://www.instagram.com/jainbhavik332/?igshid=1jftkhngatio"><i id="social" class="fa fa-instagram p-1"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="feature-content d-flex flex-row mb-5">
                                        <div class="align-items-center">
                                            <img class="rounded-circle overflow-hidden about-images mr-5 mt-3" src="CSS/harshi.jpeg" style="transform: scale(1.5)">
                                        </div>
                                        <div class="mt-3">
                                            <h4><b>HARSHADA JAIN</b></h4>
                                            <p style="font-size: 15px"><a href="https://m.facebook.com/harshi.jain.547?ref=bookmarks"><i class="fa fa-facebook p-1"></i></a><a href="https://twitter.com/HarshiJ59745805?s=08"><i class="fa fa-twitter p-1"></i></a><a href="https://www.instagram.com/_hersheyyy___/"><i class="fa fa-instagram p-1"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-box">
                                <div class="clearfix">
                                    <div class="feature-content d-flex flex-row">
                                        <div class="align-items-center">
                                            <img class="rounded-circle overflow-hidden about-images mr-5 mt-3" src="CSS/aachal.jpg">
                                        </div>
                                        <div class="mt-4">
                                            <h4><b>AACHAL JAKHOTIYA</b></h4>
                                            <p style="font-size: 15px"><a href="https://www.facebook.com/aachal.jakhotiya"><i class="fa fa-facebook p-1"></i></a><a href="#"><i class="fa fa-twitter p-1"></i></a><a href="https://www.instagram.com/aachaljakhotiya_/"><i class="fa fa-instagram p-1"></i></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <section class="footer p-2 bg-light" id="footer" height=400>
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
                        <li><a href="#aboutus"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="#howTo"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
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
            <div class="row" style="color:black;">
                <div class="col-12 text-center text-white">
                    <p style="color:black;"> <u>BookShuttle</u> is an online bookstore who sells new, old  books at a very cheap rate. </p>
                    <p class="h6" style="color:black;">© All Rights Reserved.<a class="ml-2" href="index.html" style="color:black">BOOKSHUTTLE</a></p>
                </div>
                <hr>
            </div>
        </div>
    </section> 
<!--    </div>-->
           <script>
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
            
    </body>
    
    

</html>
