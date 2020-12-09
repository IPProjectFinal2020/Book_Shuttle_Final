
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css">
        <script src="https://use.fontawesome.com/c24a3b05a2.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/book_styles.css">
    </head>
    
    <body>
        <div class="modal fade" id="loginModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Login</h4>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                </div>
              <div class="modal-body">
                <form method="post" action="SignUp.php">
                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Username: &nbsp; </label></td>
                        <td><input type="text" id="uname" name="username" class="form-control" required></td>
                      </tr>
                  </table>
                  </div>

                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label><i class="fa fa-unlock" aria-hidden="true"></i>&nbsp;Password: &nbsp; </label></td>
                        <td><input type="password" id="pass" name="password" class="form-control" required></td>
                      </tr>
                   </table>
                  </div>

                  <div class="modal-footer justify-content-center">
                    <input type="submit" id="login" name="login" value="Submit" class="btn btn-primary">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>

