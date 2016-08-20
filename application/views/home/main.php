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

    <title> Home Page</title>

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
          <!-- hee -->
           
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
       <div class="col-lg-12 col-md-12">
        <input type="button" class="btn btn-primary" id="add-employee" value="Add Employee"> 
        <hr>
          <form action="<?php $_SELF?>" method="POST" id="add_employee_form" style="display:none">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="form-group">
              <label>Birthdate</label>
              <input type="date" class="form-control" name="birthdate" placeholder="Birthdate" required>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="Address" required>
            </div>
            <div class="form-group">
              <label>Salary</label>
              <input type="number" class="form-control" name="salary" min="5000" placeholder="Salary" required>
            </div>
              <input type="submit" class="btn btn-primary" name="submit" value="Submit">
          </form>
       </div> 
        <br>
        <hr>
        <br>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Address</th>
                <th>Age</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              foreach ($employees as $employee) { ?> 
                <tr>
                  <td><?= $employee->first_name ." ". $employee->last_name ?> </td>
                  <td><?= $employee->birthdate ?> </td>
                  <td><?= $employee->address ?></td>
                  <td><?= $employee->age ?></td>
                  <td><?= $employee->salary ?></td>
                  <td>
                    <a href="edit?id=<?= $employee->id ?>" class="btn btn-warning btn-xs">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="delete?id=<?= $employee->id ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                  </td>
                </tr>
             <?php } ?>
        </tbody>
    </table>
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
    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();
      });
      $(document).ready(function(){
        $("#add-employee").click(function(){
            if($("#add_employee_form").is(":visible")){
                $("#add-employee").attr('value', 'Add Employee');
                $("#add_employee_form").hide();
            } else {
                
                $("#add-employee").attr('value', 'Cancel Form');
                $("#add_employee_form").show();
            }
            //don't follow the link (optional, seen as the link is just an anchor)
            return false;
        });
    });
    </script>
  </body>
</html>
