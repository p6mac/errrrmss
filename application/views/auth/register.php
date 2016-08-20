<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ERMS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/css/signin.css">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="register" method="POST">
        <h2 class="form-signin-heading">Register</h2>
        <label class="sr-only"> Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <br>
        <label class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <label class="sr-only">Password Again</label>
        <input type="password" name="passwordAgain" class="form-control" placeholder="Password Again" required>
          <input class="btn btn-lg btn-primary btn-block" name="register" type="submit" value="Register">  
      </form>

    </div> <!-- /container -->

  </body>
</html>
