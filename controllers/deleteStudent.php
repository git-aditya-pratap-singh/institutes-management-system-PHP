<?php
session_start();

if(!isset($_SESSION["user_session"])){
   header("location: ../views/index.php");
}
?>

<html>
    <head>
    <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="sweetalert2.all.min.js"></script>
       <script src="sweetalert2.min.js"></script>
       <link rel="stylesheet" href="sweetalert2.min.css">
       <script src="https://cdn.tailwindcss.com"></script>
       <link rel="stylesheet" href="../css/index.css">
    </head>
</html>
<?php

error_reporting(0);

include '../config/database.php';

$ids = $_GET['id'];

$del = "DELETE FROM studentscourse WHERE stud_id = $ids";
$rund = mysqli_query($conn, $del);

$delete_query = "DELETE FROM students WHERE id = $ids";
$run = mysqli_query($conn, $delete_query);

?>
<script>
    
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: "Data has been Deleted!",
    showConfirmButton: false,
    timer: 1500  
    })

    setTimeout(function(){window.location.href="../views/dashboard.php";}, 2000);   
</script>

<?php

//header('location: ../views/dashboard.php');


?>