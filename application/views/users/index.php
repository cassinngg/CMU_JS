<div class="ml-5 mr-5">

<h3><?php echo $title ?></h3>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Users</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

  <!-- start of the loop -->
  <?php foreach($users as $user) : ?>
    <tr>
      <td><?php echo $user['complete_name']; ?></td>
      <td><?php echo $user['email']; ?> </td>

    </tr>
  <?php endforeach; ?>
  <!-- end of the loop -->
  </div>
  </tbody>
</table>



