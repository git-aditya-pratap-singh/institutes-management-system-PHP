<?php 

session_start();

if(!isset($_SESSION["user_session"])){
   header("location: ./index.php");
}
?>


<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="sweetalert2.all.min.js"></script>
       <script src="sweetalert2.min.js"></script>
       <link rel="stylesheet" href="sweetalert2.min.css">
       <link rel="stylesheet" href="../css/index.css">
       <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

        <?php
        
        include '../config/database.php';
        //---------- Count Students---------------

        $sql="SELECT count(id) AS total FROM students";
        $result=mysqli_query($conn,$sql);
        $svalues=mysqli_fetch_assoc($result);


        //---------- Count Teachers---------------
        
        $sql="SELECT count(id) AS ttotal FROM teachers";
        $result=mysqli_query($conn,$sql);
        $tvalues=mysqli_fetch_assoc($result);


         //---------- Count Course---------------
        
         $sql="SELECT count(courseId) AS ctotal FROM course";
         $result=mysqli_query($conn,$sql);
         $cvalues=mysqli_fetch_assoc($result);
        ?>



        <section class="flex flex-col justify-between w-full h-screen bg-white relative">
            
        <!-- header section -->
        <div>
            <div class="w-full p-5 bg-gray-700 drop-shadow-lg flex flex-row justify-between items-center fixed z-10">

                <h1 class="font-semibold text-4xl text-white font-[cambria]"><span class="text-red-500">I.</span>M.<span class="text-sky-500">S</span></h1>

                <div class="flex justify-center items-center gap-x-5 text-white font-[cambria] ">
                    <div class="text-white flex items-center space-x-2 cursor-pointer" onclick="addstudents()"><i class="fa fa-user-plus" aria-hidden="true"></i><h1>Add Students</h1></div>
                    <div class="text-white flex items-center space-x-2 cursor-pointer" onclick="addteachers()"><i class="fa fa-user-plus" aria-hidden="true"></i><h1>Add Teachers</h1></div>
                    <div class="text-white flex items-center space-x-2 cursor-pointer" onclick="addcourse()"><i class="fa fa-user-plus" aria-hidden="true"></i><h1>Add Course</h1></div>
                </div>
               


                <div class="flex gap-x-10 items-center font-[cambria]">
                    <span class="flex space-x-2 items-center text-white  cursor-pointer"><i class="fa fa-user" aria-hidden="true"></i><h1 class="text-white"><?php echo $_SESSION['user_session'];?></h1></span>
                    <span class="flex space-x-2 items-center text-white cursor-pointer"><i class="fa fa-power-off text-red-400" aria-hidden="true"></i><p class="text-white" onclick="logout()">logout</p></span>
                </div>
               
            </div>


        <!-- middle main section -->
        <div class="w-full grid grid-cols-3 gap-5 place-items-center mt-24">

            

            <div class="p-5 w-[300px] rounded bg-gray-700 flex flex-row justify-center items-center gap-x-4">

                <div class="text-white text-4xl"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>

                <span class="text-4xl font-semibold font-[cambria] text-white flex flex-row items-end">
                    <h1>Total Student's <span class="text-emerald-300">(<?php echo $svalues['total'];?>)</span></h1>

                    <button type="button" class="text-white bg-emerald-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 
                    text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="return seestudentTable()" ondblclick="return hideTable()">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                    </button>

                </span>

            </div>

           

            <div class="p-5 w-[300px] rounded bg-gray-700 flex flex-row justify-center items-center gap-x-4">

                <div class="text-white text-4xl"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>

                <span class="text-4xl font-semibold font-[cambria] text-white flex flex-row items-end">
                    <h1>Total Teacher's <span class="text-emerald-300">(<?php echo $tvalues['ttotal'];?>)</span></h1>

                    <button type="button" class="text-white bg-emerald-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 
                    text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="return seeteacherTable()" ondblclick="return hideTable()">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                    </button>

                </span>

            </div>

            <div class="p-5 w-[300px] rounded bg-gray-700 flex flex-row justify-center items-center gap-x-4">
                <div class="text-white text-4xl"><i class="fa fa-book" aria-hidden="true"></i></div>
                <span class="text-4xl font-semibold font-[cambria] text-white flex flex-col items-end">
                    <h1>Total Course <span class="text-emerald-300">(<?php echo $cvalues['ctotal'];?>)</span></h1>
                    <button type="button" class="text-white bg-emerald-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 
                    text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="return seecourseTable()" ondblclick="return hideTable()">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                    </button>
                </span>

            </div>
           
        </div>
        </div>




        
        <!-- Here is table section-->

        <img src="../img/bg.png" alt="" class="bg-center bg-cover h-auto w-[40%] mx-auto hidden" id="image"/>



        <section class="w-full p-8 mx-auto flex flex-col gap-5">

     
        <!-- All Students Table -->
            <div class="flex flex-col mx-auto hidden" id="seeStudent">
                <h1 class="text-3xl font-bold font-[cambria] text-center">All Students</h1>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full text-left text-sm font-light border rounded font-[cambria]">
                    <thead class="border-b-2 font-medium dark:border-gray-700 uppercase text-center">
                        <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">Phone no.</th>
                        <th scope="col" class="px-6 py-4">DOB</th>
                        <th scope="col" class="px-6 py-4">Gender</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        include '../config/database.php';

                        $query = "SELECT * FROM students";
                        $run = mysqli_query($conn, $query);

                        while($res = mysqli_fetch_assoc($run)){
                           
 
                    ?>

                        <tr
                        class="border-b-2 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600 hover:text-white text-center" >
                        <td class="whitespace-nowrap px-6 py-4 font-bold"><?php echo $res['id'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $res['name'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $res['email'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $res['phone'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $res['dob'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $res['Gender'];?></td>
                        <td class="whitespace-nowrap px-6 py-4 flex flex-row gap-x-2">
                        
                            <a href="../controllers/editstudent.php?id=<?php echo $res['id'];?>">
                              
                                <button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 
                                    focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
                                    onclick="">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
                                Edit</button>
                            </a>

                           
                            <a href="../controllers/deleteStudent.php?id=<?php echo $res['id'];?>">
                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                            focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" name="deleteButton">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </a>
                        </td>
                        </tr>

                        <?php
                        }
                        ?>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>




             <!-- All Teachers Table -->
             <div class="flex flex-col mx-auto hidden" id="seeTeacher">
                <h1 class="text-3xl font-bold font-[cambria] text-center">All Teachers</h1>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full text-left text-sm font-light border rounded font-[cambria]">
                    <thead class="border-b-2 font-medium dark:border-gray-700 uppercase text-center">
                        <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">Phone no.</th>
                        <th scope="col" class="px-6 py-4">DOB</th>
                        <th scope="col" class="px-6 py-4">Gender</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        include '../config/database.php';

                        $query = "SELECT * FROM teachers";
                        $run = mysqli_query($conn, $query);
                        
                        while($ress = mysqli_fetch_assoc($run)){
                        

                    ?>

                        <tr
                        class="border-b-2 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600 hover:text-white text-center" >
                        <td class="whitespace-nowrap px-6 py-4 font-bold"><?php echo $ress['id'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $ress['name'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $ress['email'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $ress['phone'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $ress['dob'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $ress['Gender'];?></td>
                        <td class="whitespace-nowrap px-6 py-4 flex flex-row gap-x-2">

                        <a href="../controllers/editteacher.php?id=<?php echo $ress['id'];?>">
                            <button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 
                            focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                        </a>

                        <a href="../controllers/deleteTeacher.php?id=<?php echo $ress['id'];?>">
                            <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                            focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </a>


                        </td>
                        </tr>

                        <?php
                        }
                        ?>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>







            <!-- All Course Table -->
            <div class="flex flex-col mx-auto hidden" id="seeCourse">
                <h1 class="text-3xl font-bold font-[cambria] text-center">All Course</h1>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full text-left text-sm font-light border rounded font-[cambria]">
                    <thead class="border-b-2 font-medium dark:border-gray-700 uppercase text-center">
                        <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Description</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        include '../config/database.php';

                        $query = "SELECT * FROM course";
                        $run = mysqli_query($conn, $query);
                        
                        while($resc = mysqli_fetch_assoc($run)){
                           
 
                    ?>

                        <tr
                        class="border-b-2 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600 hover:text-white text-center" >
                        <td class="whitespace-nowrap px-6 py-4 font-bold"><?php echo $resc['courseId'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $resc['courseName'];?></td>
                        <td class="whitespace-nowrap px-6 py-4"><?php echo $resc['description'];?></td>
                        
                        <td class="whitespace-nowrap px-6 py-4 flex flex-row gap-x-2">

                        <a href="../controllers/editCourse.php?id=<?php echo $resc['courseId'];?>">
                            <button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 
                            focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                        </a>

                        <a href="../controllers/deleteCourse.php?id=<?php echo $resc['courseId'];?>">
                            <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                            focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </a>

                        </td>
                        </tr>

                        <?php
                        }
                        ?>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>


        </section>

        

          
        <div class="w-full p-8 bg-gray-100 text-center">
            <h1>@2023 Copyright CrescdataSoft</h1>
        </div>
        </section>


        <!-- ******* Add Students Form **********-->
        
        <section class="max-w-[500px] h-fit bg-white rounded border shadow p-5 flex flex-col absolute hidden top-[30%]  mx-auto inset-0" id="addstudentForm">
        
            <i class="fa fa-times " aria-hidden="true" onclick="return formHide()"></i>

           <h1 class="text-3xl font-semibold font-[cambria] text-gray-800 text-center">Add Student's</h1>
           
           <form action="" method="post" id="myForm" onsubmit="return stuDetails()" autocomplete="off">

                <div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Name : </label>
					<input type="text" name="uname" id="uname" placeholder="enter your name" required class="p-2 text-[0.9rem] border-2 rounded "/>
                    <span class="text-red-500 text-sm font-semibold" id="name_error"></span>
				</div>


				<div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Email : </label>
					<input type="text" name="uemail" id="uemail" required placeholder="enter your email" class="p-2 text-[0.9rem] border-2 rounded " />
                    <span class="text-red-500 text-sm font-semibold" id="email_error"></span>
				</div>


				<div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Phone no. : </label>
					<input type="phone" name="uphone" id="uphone" placeholder="enter your Phone no." required class="p-2 text-[0.9rem] border-2 rounded " />
                    <span class="text-red-500 text-sm font-semibold" id="phone_error"></span>
                </div>


                <div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">DOB : </label>
					<input type="date" name="udate" id="udate" class="p-2 text-[0.9rem] border-2 rounded "/>
                    <span class="text-red-500 text-sm font-semibold" id="dob_error"></span>
				</div>


                <div class="flex flex-row justify-start items-center space-x-2 mt-4">
					<label class="text-[0.9rem] font-bold">Gender : </label>
					<label class="text-[0.8rem]"><input type="radio" name="gender" id="gender2" value="male"/>Male</label>
					<label class="text-[0.8rem]"><input type="radio" name="gender" id="gender2" value="female" />Female</label>
                    <span class="text-red-500 text-sm font-semibold" id="gender_error"></span>
				</div>

                <!-- <div class="flex flex-row justify-start items-center space-x-2 mt-4">
					<label class="text-[0.9rem] font-bold">Which Technology are you interested?</label>
					<label class="text-[0.8rem]"><input type="Checkbox" name="interested" id="react" value="react" />MERN</label>
					<label class="text-[0.8rem]"><input type="Checkbox" name="interested" id="node" value="node" />MEAN</label>
					<label class="text-[0.8rem]"><input type="Checkbox" name="interested" id="angular" value="angular" />MEVN</label>
					<label class="text-[0.8rem]"><input type="Checkbox" name="interested" id="django" value="django" />LAMP</label>
				</div>
                <span class="text-red-500 text-sm font-semibold" id="course_error"></span> -->


				<input type="submit" value="Submit" name="submitdata" class="mt-4 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                 text-white font-[cambria] w-full p-1 rounded outline-none shadow-lg active:scale-90 ease-in-out duration-500"/>


           </form>
          
        </section>
        
        






        <!-- ******* Add Teachers Form **********-->

        <section class="max-w-[500px] h-fit bg-white rounded border shadow p-5 flex flex-col absolute hidden top-[30%]  mx-auto inset-0" id="addteachersForm">

            <i class="fa fa-times " aria-hidden="true" onclick="return formHide()"></i>
           <h1 class="text-3xl font-semibold font-[cambria] text-gray-800 text-center">Add Teacher's</h1>
           
           <form action="" method="post" id="myForm" onsubmit="return teaDetails()" autocomplete="off">

                <div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Name : </label>
					<input type="text" name="tname" id="tname" placeholder="enter your name" required class="p-2 text-[0.9rem] border-2 rounded "/>
                    <span class="text-red-500 text-sm font-semibold" id="tname_error"></span>
				</div>


				<div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Email : </label>
					<input type="text" name="temail" id="temail" required placeholder="enter your email" class="p-2 text-[0.9rem] border-2 rounded " />
                    <span class="text-red-500 text-sm font-semibold" id="temail_error"></span>
				</div>


				<div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">Phone no. : </label>
					<input type="phone" name="tphone" id="tphone" placeholder="enter your Phone no." required class="p-2 text-[0.9rem] border-2 rounded " />
                    <span class="text-red-500 text-sm font-semibold" id="tphone_error"></span>
				</div>


                <div class="flex flex-col space-y-2 mt-4">
					<label class="text-[0.9rem] font-bold">DOB : </label>
					<input type="date" name="tdate" id="tdate" class="p-2 text-[0.9rem] border-2 rounded "/>
                    <span class="text-red-500 text-sm font-semibold" id="tdob_error"></span>
				</div>


                <div class="flex flex-row justify-start items-center space-x-2 mt-4">
					<label class="text-[0.9rem] font-bold">Gender : </label>
					<label class="text-[0.8rem]"><input type="radio" name="tgender" id="gender1" value="male"/>Male</label>
					<label class="text-[0.8rem]"><input type="radio" name="tgender" id="gender2" value="female" />Female</label>
                    <span class="text-red-500 text-sm font-semibold" id="tgender_error"></span>
				</div>

               
				<input type="submit" value="Submit" name="submitinfo" class="mt-4 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
                 text-white font-[cambria] w-full p-1 rounded outline-none shadow-lg active:scale-90 ease-in-out duration-500"/>

           </form>

        </section>


        <?php include 'course.php';?>

        
        


        <script>
            function logout(){
                var data = confirm("Are you Sure. You want to logout?");

		        if(data==true){
			        window.location.href="../controllers/logout.php";
		        }
		        else{
			        window.location.href="./dashboard.php";
		        }
              }

            window.onload = function init(){
                var ig = document.getElementById("image");
                ig.style.display = "block";
            }
            
        </script>
    
       <script type="text/javascript" src="../js/index.js?v=<?= time() ?>"></script> 
       <script type="text/javascript" src="../js/teacherValidation.js?v=<?= time() ?>"></script> 
    </body>
</html>



<?php
error_reporting(0);

include '../config/database.php';
//session_start();

if(isset($_POST['submitdata'])){
    $named = $_POST['uname'];
    $mail = $_POST['uemail'];
    $phone = $_POST['uphone'];
    $dob = $_POST['udate'];
    $gen = $_POST['gender'];


   

    
    $checkquery = "SELECT * FROM students WHERE email = '$mail' OR phone = '$phone'";
    $result = mysqli_query($conn, $checkquery);

        
    if(mysqli_num_rows($result) > 0){
        ?>
        <script>
           Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "These student is already registered!",
                    showConfirmButton: false,
                    timer: 1500  
                    })
        </script>
        <?php 

    }
    else{
        $insertquery = "INSERT INTO students(name,email,phone,dob,Gender) values('$named','$mail','$phone','$dob','$gen')";

                                   
        $query3=mysqli_query($conn,$insertquery);

            if($query3){
                ?>
                <script>
                
                   Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "Add Students is Successfully!",
                    showConfirmButton: false,
                    timer: 1500  
                    })
                </script>

                <?php
            
            }
    }


}







// Add Teachers---------------------------------------

if(isset($_POST['submitinfo'])){
    $named = $_POST['tname'];
    $mail = $_POST['temail'];
    $phone = $_POST['tphone'];
    $dob = $_POST['tdate'];
    $gen = $_POST['tgender'];


    include '../config/database.php';

    
    $checkquery = "SELECT * FROM teachers WHERE email = '$mail' OR phone = '$phone'";
    $result = mysqli_query($conn, $checkquery);

        
    if(mysqli_num_rows($result) > 0){
        ?>
        <script>
           Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "These Teacher is already registered!",
                    showConfirmButton: false,
                    timer: 1500  
                    })
        </script>
        <?php 

    }
    else{
        $insertquery = "INSERT INTO teachers(name,email,phone,dob,Gender) values('$named','$mail','$phone','$dob','$gen')";

                                   
        $query3=mysqli_query($conn,$insertquery);

            if($query3){
                ?>
                <script>
                
                   Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: "Add Teachers is Successfully!",
                    showConfirmButton: false,
                    timer: 1500  
                    })
                </script>

                <?php
            
            }
    }


}



?>
