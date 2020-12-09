<!DOCTYPE html>
<html>
    <head>
      <title></title>
      <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        
    </head>
    <body>    
       

        <div class="modal fade" id="Sellbooksmodal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h4 style="color: #2fccd0;">Add Books To Sell</h4>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
              </div>

              <div class="modal-body">
                <form name="sellbook" action="addbooks.php" method="post" enctype="multipart/form-data" onsubmit="return validatesellbook();">
                  <table>



    
                      <div class="form-group">
                          <tr>
                            <td><label for="username"><i class="fa fa-user"></i>Username<span style="color: red;">*</span></label></td>
                            <td><input type="text" name="username" id="username" class="form-control"></td>
                          </tr>
                          <tr>
                              <td></td>
                          </tr>
                      </div>

                      <tr class="form-group my-3">
                        <td><label for="bookname"><i class="fa fa-address-book" aria-hidden="true"></i>Book Name<span style="color: red;">*</span></label></td>
                        <td><input type="text" name="bookname" id="bookname" class="form-control"></td>
                      </tr>


                  <div class="form-group">
                      <tr>
                        <td><label><i class="fa fa-filter" aria-hidden="true"></i>Category</label></td>
                        <td>
                          <select name="category" class="form-control"> 
                            <option value="Science">Science</option>
                            <option value="Commerce">Commerce</option>
                            <option value="Arts">Arts</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Novel">Novel</option>
                            <option value="Other">Other</option> 
                          </select>
                        </tr>
                  </div>

                  <div class="form-group">
                      <tr>
                        <td><label for="price"><i class="fa fa-money" aria-hidden="true"></i>Price<span style="color: red;">*</span> </label></td>
                        <td><input type="text" name="price" class="form-control"></td>
                      </tr>
                      <tr>
                          <td></td>
                      </tr>
                  </div>

                  <div class="form-group">
                      <tr>
                        <td><label for="bookcondn"><i class="fa fa-question" aria-hidden="true"></i>Book Condition<span style="color: red;">*</span></label></td>
                          <td class="radio">
                            <input type="radio" name="bcondn" value="New" ><label for ="bcondn"> New </label> 
                            <input type="radio" name="bcondn" value="Moderate" ><label for ="bcondn"> Moderate </label> 
                            <input type="radio" name="bcondn" value="Old"><label for ="bcondn"> Old </label>
                            <input type="radio" name="bcondn" value="VeryOld"><label for ="bcondn"> Very Old </label>
                          </td>
                      </tr>
                      <tr>
                          <td></td>
                      </tr>  
                  </div>
    

    
                  <div class="form-group">
                      <tr>
                        <td><label for="contactno"><i class="fa fa-phone" aria-hidden="true"></i>Contact No<span style="color: red;">*</span></label></td>
                        <td><input type="number" name="contactno" class="form-control"></td>
                      </tr>
                      <tr>
                        <td></td>
                      </tr>
                  </div>


                  <div class="form-group">
                      <tr>
                        <td><label for="description"><i class="fa fa-info" aria-hidden="true"></i>Description<span style="color: red;">*</span></label></td>
                        <td><textarea name="description" class="form-control"></textarea></td>
                      </tr> 
                      <tr>
                        <td></td>
                      </tr>
                  </div>

                  <div class="form-group">
                    <tr>
                      <td><label for="bookimage"><i class="fa fa-file-image-o" aria-hidden="true"></i> Upload image of Book<span style="color: red;">*</span></label></td>
                      <td><input type="file" name="bookimage" class="form-control"></td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                  </div>
    

                </table>

                  <div class="modal-footer justify-content-center">
                    <input type="submit" name="submit" value="Add Book" class="btn btn-primary">
                    <input type="submit" name="cancel" value="Cancel" class="btn btn-secondary" data-dismiss="modal">
                  </div>
                </form>



              </div>
            </div>
          </div>
        </div>
        <script src="Javascript/sellbook.js"></script>
    </body>
</html>
