<html>
    <head>
    <title>Course</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="sweetalert2.all.min.js"></script>
       <script src="sweetalert2.min.js"></script>
       <link rel="stylesheet" href="sweetalert2.min.css">
       <link rel="stylesheet" href="../css/course.css">
       <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
         
    <!-- ******* Edit Course Form **********-->

    <?php
      error_reporting(0);
    
      include '../config/database.php';

      $id = $_GET['id'];
      $select = "SELECT * FROM course WHERE courseId = $id";
      $res = mysqli_query($conn, $select);

      $response = mysqli_fetch_assoc($res);
    ?>
 
    <section class="max-w-[500px] h-fit bg-white rounded border shadow p-5 flex flex-col absolute top-[25%] mx-auto inset-0" id="addcourseForm">
          
           <h1 class="text-3xl font-semibold font-[cambria] text-gray-800 text-center">Edit Course's</h1>
           
           <form action="" method="post" id="myForm" onsubmit="return courseb()" autocomplete="off">

                <div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Course : </label>
					<input type="text" name="course" id="course" placeholder="enter your course" required class="p-2 text-[0.9rem] border-2 rounded " value="<?php echo $response['courseName'];?>"/>
                    <span class="text-red-500 text-sm font-semibold" id="course_error"></span>
				</div>


				<div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Description : </label>
					<input type="text" name="cdescription" id="cdescription" required placeholder="enter your Description" class="p-2 text-[0.9rem] border-2 rounded" value="<?php echo $response['description'];?>"/>
                    <span class="text-red-500 text-sm font-semibold" id="description_error"></span>
				</div>


				<input type="submit" value="Submit" name="submitcourse" class="mt-4 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                 text-white font-[cambria] w-full p-1 rounded outline-none shadow-lg active:scale-90 ease-in-out duration-500"/>


           </form>

        </section>


        <script type="text/javascript" src="../js/course.js?v=<?= time() ?>"></script> 
        <script type="text/javascript" src="../js/index.js?v=<?= time() ?>"></script> 
    </body>
</html>


<?php

error_reporting(0);

//session_start();

if(isset($_POST['submitcourse'])){
    $c_name = $_POST['course'];
    $c_des = $_POST['cdescription'];

    
    include '../config/database.php';


        $checkquery = "UPDATE course SET courseName='{$c_name}', description='{$c_des}' WHERE courseId = $id";
        $result = mysqli_query($conn, $checkquery);
          
        
        ?>
        <script>
            Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "These Course has been Updated!",
                    showConfirmButton: false,
                    timer: 1500  
                    })

                    setTimeout(function(){window.location.href="../views/dashboard.php";}, 2000);
        </script>
        <?php 
    
    } 
    


?>