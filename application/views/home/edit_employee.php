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

    <title> Edit Employee</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php base_url()?>assets/css/dataTables.bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="<?php base_url()?>assets/css/navbar.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
           
            <a class="navbar-brand" href="#">ERRRRRMMS! Employee Records Management System</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

          <form action="update" method="POST">
           <div class="form-group">
            <h3>Edit Employee:</h3>
              <label>ID</label>
              <input type="text" class="form-control" name="id" value="<?= $this->input->get('id') ?>" placeholder="First Name" disabled>
            </div>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" value="<?= $user_info['first_name'] ?>" placeholder="First Name">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" value="<?= $user_info['last_name']?>" placeholder="Last Name">
            </div>
            <div class="form-group">
              <label>Birthdate</label>
              <input type="date" class="form-control" name="birthdate" placeholder="Birthdate" value="<?= $user_info['birthdate'] ?>">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="Address" value="<?= $user_info['address']?>">
            </div>
            <div class="form-group">
              <label>Salary</label>
              <input type="number" class="form-control" name="salary" min="5000" placeholder="Salary" value="<?= $user_info['salary']?>">
            </div>
              <input type="submit" class="btn btn-primary" name="submit" value="Update Employee">
              <a href="<?php base_url()?>home" class="btn btn-danger" > Back to Home</a>
          </form>

      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php base_url()?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php base_url()?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php base_url()?>assets/js/dataTables.bootstrap.min.js"></script>


  </body>
</html>
