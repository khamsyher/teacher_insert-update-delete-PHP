<?php 
    include 'config.php';
     $id = $_GET['t_id'];
    
        
        $delete = "DELETE FROM teacher WHERE t_id = '$id'";
        if($conn->query($delete)==true){
            ?>
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Delete Data Success!',
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
                    title: 'Delete  Error!.',
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
    
    

?>