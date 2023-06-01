


<div class="container">
  <h2>Add Teacher</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" name="last_name">
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
      <select class="form-control" id="gender" name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="form-group">
      <label for="telephone">Telephone:</label>
      <input type="text" class="form-control" id="telephone" name="telephone">
    </div>
    <div class="form-group">
      <label for="subject">Subject:</label>
      <input type="text" class="form-control" id="subject" name="subject">
    </div>
    <button type="submit" name="btn_add" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php
    include 'config.php';
    if(isset($_POST['btn_add'])){
        $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $telephone = $_POST['telephone'];
    $subject = $_POST['subject'];

    $insert = "INSERT INTO teacher (t_name, t_lastname, t_gen, t_telephone, t_subject) VALUES ('$name', '$last_name', '$gender', '$telephone', '$subject')";

    if($conn->query($insert)==true){
        ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Insert Data Success!',
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
                title: 'Insert  Error!.',
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
    

    mysqli_close($conn);
?>    
