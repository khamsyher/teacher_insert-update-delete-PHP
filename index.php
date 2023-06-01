<?php 
include 'config.php';

$sql = "SELECT * FROM teacher";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
  <div class="container">
    <h2>Teacher Table</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Last Name</th>
          <th>Gender</th>
          <th>Telephone</th>
          <th>Subject</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row["t_id"]; ?></td>
            <td><?php echo $row["t_name"]; ?></td>
            <td><?php echo $row["t_lastname"]; ?></td>
            <td><?php echo $row["t_gen"]; ?></td>
            <td><?php echo $row["t_telephone"]; ?></td>
            <td><?php echo $row["t_subject"]; ?></td>
            <td>
                <a href="update_teacher.php?t_id=<?=$row['t_id']?>" class="btn btn-primary">Edit</a>
                <a href="delete_teacher.php?t_id=<?=$row['t_id']?>" class="btn btn-primary">Delete</a>
            </td>     
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <!-- this is button add data -->
    <a href="add_teacher.php" class="btn btn-primary">Add Teacher</a>
    
  </div>
  
<?php
} else {
  echo "0 results";
}
mysqli_close($conn);
?>