<?php
session_start();

if(!isset($_SESSION["user_session"])){
   header("location: ../views/index.php");
}


include '../config/database.php';

$ids = $_GET['id'];

$query = "SELECT * FROM students WHERE id = $ids";
$run = mysqli_query($conn, $query);

$sturesult = mysqli_fetch_array($run);
?>

<html>

<head>
    <title>IMS System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>

    <section class=" py-1 bg-blueGray-50">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Student Information
                        </h6>
                        <button class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white  font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none 
                        focus:outline-none mr-1 ease-linear transition-all duration-150" type="button" onclick="fun()">
                            Go Back
                        </button>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">

                    <form action="" method="POST">

                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Student Information
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Name
                                    </label>
                                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full 
              ease-linear transition-all duration-150" name="name" value="<?php echo $sturesult['name']; ?>">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Email address
                                    </label>
                                    <input type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded 
              text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="email" value="<?php echo $sturesult['email']; ?>">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        Phone no.
                                    </label>
                                    <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none 
              focus:ring w-full ease-linear transition-all duration-150" name="phone" value="<?php echo $sturesult['phone']; ?>">
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                        DOB
                                    </label>
                                    <input type="date" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none 
              focus:ring w-full ease-linear transition-all duration-150" name="dob" value="<?php echo $sturesult['dob']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <div class="flex flex-row justify-start items-center space-x-2  uppercase text-blueGray-600 text-xs font-bold">
                                    <label class="text-[0.9rem] font-bold">Gender : </label>

                                    <label class="text-[0.8rem]"><input type="radio" name="gender" id="gender2" value="male" <?php
                                                                                                                                if ($sturesult['Gender'] == "male") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> /> Male</label>

                                    <label class="text-[0.8rem]"><input type="radio" name="gender" id="gender2" value="female" <?php
                                                                                                                                if ($sturesult['Gender'] == "female") {
                                                                                                                                    echo "checked";
                                                                                                                                }
                                                                                                                                ?> /> Female</label>

                                </div>
                            </div>
                        </div>
                </div>

                <div class="w-full lg:w-6/12 px-4 ">
                    <div class="relative w-fit flex flex-wrap -mt-8 mx-10">
                        <div class="flex flex-row justify-start items-center space-x-2 uppercase text-blueGray-600 text-xs font-bold ">
                            <label class="text-[0.9rem] font-bold">Avaliable Courses : </label>

                            <?php

                            error_reporting(0);
                            include '../config/database.php';

                            $query = "SELECT * FROM course";
                            $run = mysqli_query($conn, $query);
                            
                            //----------------CODE PROBLEM------------------------------
                            while ($resp = mysqli_fetch_assoc($run)) 
                            {
                                $course_id = $resp['courseId'];

                                //print_r($course_id = $resp['courseId']);
                                //exit;

                                $cour_query = "SELECT * FROM studentscourse WHERE stud_id = $ids AND courseId = $course_id";
                                $runque = mysqli_query($conn,$cour_query);
                                
                               

                                if(mysqli_num_rows($runque) > 0)
                                {
                                
                            ?>
                                <label class="text-[0.8rem]"><input type="Checkbox" name="course[]" id="react" value="<?php echo $resp['courseId']; ?>" checked/> <?php echo $resp['courseName']; ?></label>

                            <?php
                                }
                                else{      
                                ?>
                                    <label class="text-[0.8rem]"><input type="Checkbox" name="course[]" id="react" value="<?php echo $resp['courseId']; ?>"/> <?php echo $resp['courseName']; ?></label>

                               <?php
                                }
                            
                            }
                            ///////////////////////////////////////////////////////////////////////////
                            ?>
                            


                        </div>
                    </div>
                </div>

                <button type="submit" class="w-4/12 mt-5 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none 
        focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-auto mb-2" name="stupdate">Update</button>

                </form>

                <hr class="mt-6 border-b-1 border-blueGray-300">


                <footer class="relative pt-8 pb-6 mt-2">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                                <div class="text-sm text-blueGray-500 font-semibold py-1">
                                    <span class="text-blueGray-500 hover:text-blueGray-800">Made by Aditya</span>
                                </div>
                            </div>
                        </div>
                </footer>
            </div>
    </section>


    <script>
        function fun(){
            window.location.href="../views/dashboard.php";
        }
    </script>

</body>

</html>

<?php

error_reporting(0);

if (isset($_POST['stupdate'])) {


    $uname = $_POST['name'];
    $uemail = $_POST['email'];
    $uphone = $_POST['phone'];
    $udob = $_POST['dob'];
    $ugen = $_POST['gender'];
    $ucourseid = $_POST['course'];

    include '../config/database.php';


    if (isset($_POST['course'])) {

        $update_query = "UPDATE students SET name='{$uname}', email='{$uemail}', phone='{$uphone}', dob='{$udob}', Gender='{$ugen}' WHERE id = $ids";
        mysqli_query($conn, $update_query);


        mysqli_query($conn, "DELETE FROM studentscourse WHERE stud_id = $ids");


        foreach ($ucourseid as $value) {
            mysqli_query($conn, "insert into studentscourse (stud_id, courseId) values($ids,$value)");
        }


        ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: "Data Updated is Successfully!",
                showConfirmButton: false,
                timer: 1500  
                })

                setTimeout(function(){window.location.href="../views/dashboard.php";}, 2000);
                
  
            </script>

             
        <?php
      
       

    } else {
        ?>
        <script>
            alert("Please! select at least one Course.");
        </script>

        <?php
    }
}


?>