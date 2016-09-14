<img src="<?php base_url()?>assets/img/logo.jpg" alt="LOGO HERE" width="60" height="50" style=" float:left">
<div style="display:inline;"><h3>Employee Records Management System </h3></div>

<hr>
<div style="overflow-x:auto;">
<table width="100%" style="border-collapse: collapse;">
<thead>
    <tr>
        <th style=" background-color: #4CAF50; color: white;">First Name</th>
        <th style=" background-color: #4CAF50; color: white;">Last Name</th>
        <th style=" background-color: #4CAF50; color: white;">Birthdate</th>
        <th style=" background-color: #4CAF50; color: white;">Address</th>
        <th style=" background-color: #4CAF50; color: white;">Age</th>
        <th style=" background-color: #4CAF50; color: white;">Salary</th>
    </tr>
</thead>
<tbody>
    <?php
      foreach ($employees as $employee) { ?>
        <tr>
          <td style="text-align:center"><?= $employee->first_name  ?> </td>
          <td style="text-align:center"><?= $employee->last_name ?></td>
          <td style="text-align:center"><?= $employee->birthdate ?> </td>
          <td style="text-align:center"><?= $employee->address ?></td>
          <td style="text-align:center"><?= $employee->age ?></td>
          <td style="text-align:center"><?= $employee->salary ?></td>
        </tr>
     <?php } ?>
</tbody>
</table>
</div>
