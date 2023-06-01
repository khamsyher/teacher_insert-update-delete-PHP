<div class="container">
  <h2>Edit Teacher</h2>
  <?php
    include 'config.php';
    $id = $_GET['t_id'];
    $query = "SELECT * FROM teacher WHERE t_id = '$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
  ?>
  <form action="update_teacher.php" method="POST">
    <input type="hidden" name="t_id" value="<?php echo $row['t_id']; ?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['t_name']; ?>">
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['t_lastname']; ?>">
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select class="form-control" id="gender" name="gender">
        <option value="Male" <?php if($row['t_gen'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if($row['t_gen'] == 'Female') echo 'selected'; ?>>Female</option>
      </select>
    </div>
    <div class="form-group">
      <label for="telephone">Telephone:</label>
      <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $row['t_telephone']; ?>">
    </div>
    <div class="form-group">
      <label for="subject">Subject:</label>
      <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row['t_subject']; ?>">
    </div>
    <button type="submit" name="btn_update" class="btn btn-primary">Update</button>
  </form>
</div>
<?php 
  if(isset($_POST['btn_update'])){
    include 'config.php';
    $t_id = $_POST['t_id'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $telephone = $_POST['telephone'];
    $subject = $_POST['subject'];

    $update = "UPDATE teacher SET t_name='$name', t_lastname='$last_name', t_gen='$gender', t_telephone='$telephone', t_subject='$subject' WHERE t_id='$t_id'";
    if($conn->query($update)==true){
        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Update Data Success!',
                showConfirmButton: false,
                timer: 1500
            })
            window.setTimeout(function(){
                window.location.href = "index.php";
            }, 2000);
        </script>
        <?php
    }else{
        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Update Error!.',
                showConfirmButton: false,
                timer: 1500
            })
            window.setTimeout(function(){
                window.location.href = "index.php";
            }, 5000);
        </script>
        <?php
        echo $conn_db->error;
    }
  }
?>