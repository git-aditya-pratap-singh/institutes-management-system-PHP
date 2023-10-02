<?php 

session_start();

if(isset($_SESSION["user_session"])){
   header("location: ./dashboard.php");
}
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
    </head>





    <body>
        
    <section class="bg-[url('../img/home.jpg')] bg-center bg-cover w-full h-full relative">
        
        <div class="flex flex-col justify-between items-stretch">
            <div class="w-full bg-slate-200 p-8 text-center text-4xl font-bold font-[cambria] text-gray-800 drop-shadow-xl">
                <h1>Institute Management System</h1>
            </div>

            <div class="mt-[16%] w-full p-8 text-center text-2xl font-bold font-[cambria] text-white">
                <h1>“Education is the passport to the future, for tomorrow belongs to those who prepare for it today.”</h1>
            </div>

            <button class="mx-auto p-2 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
             text-white font-[cambria] rounded shadow-lg w-[200px] flex gap-x-2 justify-center items-center
" onclick="loginform()"><i class="fa fa-sign-in" aria-hidden="true"></i> login</button>


        </div>
        
    </section>


    <!-- login form -->

    <section class="bg-white rounded p-5 w-[500px] mx-[35%] absolute -mt-[30%] scale-0" id="loginform">
        <h1 class="text-center font-bold text-2xl text-gray-600 font-[cambria]">Login here!</h1>
        <span class="absolute -mt-5" id="cross"><i class="fa fa-times" aria-hidden="true" onclick="loginhide()"></i></span>

        <form action="" method="POST" autocomplete="off">

        <div class="flex flex-row items-center space-x-2 mt-5 border-2 rounded px-2">
            <span class="text-blue-700"><i class="fa fa-envelope icon"></i></span>		
			<input type="text" name="user" id="user" required placeholder="enter your username" class="w-full p-2 text-[0.9rem] outline-none text-[cambria]" />
        </div>
        <span class="text-red-500 text-[0.8rem] font-semibold" id="error"></span>

        <div class="flex flex-row items-center space-x-2 mt-5 border-2 rounded px-2">
            <span class="text-blue-700"><i class="fa fa-key" aria-hidden="true"></i></span>		
			<input type="password" name="pswd" id="pswd" required placeholder="enter your password" class="w-full p-2 text-[0.9rem] outline-none text-[cambria] " />
        </div>

        <button class="w-full mt-5 p-2 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800
         text-white font-[cambria] rounded shadow-lg w-[200px] flex gap-x-2 justify-center items-center
            active:scale-90 ease-in-out duration-500" name="logindata"> <i class="fa fa-sign-in" aria-hidden="true"></i> login</button>


        </form>
        
        
    </section>

    <script src="../js/index.js"></script>
    <script>
        var data = document.getElementById("loginform");

        function loginhide(){
            data.style.transform="scale(0)";
        }
    </script>
    </body>
</html>



<?php

error_reporting(0);

session_start();

if(isset($_POST['logindata'])){
    $useradmin = $_POST['user'];
    $password = $_POST['pswd'];

    //----Connect Database-----------

    $servername="localhost";
    $username="root";
    $data_password="";
    $database_name="crescdata";

    //-----Create a Connection--------

    $conn=mysqli_connect($servername, $username, $data_password,$database_name);

    // Die if connection was not successfully

    if(!$conn){
        die("Sorry we failed to connect: ".mysqli_connect_error());
    }
    else{
        $checkquery = "SELECT * FROM admin WHERE username = '$useradmin'";
        $result = mysqli_query($conn, $checkquery); 
        
        if(mysqli_num_rows($result) == 1){
    
            $row=mysqli_fetch_assoc($result);

             $pswd = base64_decode($row['password']);
            
            if($password == $pswd){
                $_SESSION["user_session"] = $row['username'];

                //----Move on another file---

                ?>
                    <script type="text/javascript">
                        window.location.href="./dashboard.php";
                    </script>

                <?php
            }
            else{
                ?>
                <script>
                    Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Invalid Password!",
                    showConfirmButton: false,
                    timer: 1500  
                    })

                </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: "Username doesn't exist!",
                showConfirmButton: false,
                timer: 1500  
                })
  
            </script>
            <?php
        }
    }

}
?>


