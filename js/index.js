
var login = document.getElementById("loginform");
var addStu = document.getElementById("addstudentForm");
var addTea = document.getElementById("addteachersForm");
var addCoursef = document.getElementById("addcourseForm");

// Table---------
var stuTable = document.getElementById("seeStudent");
var teaTable = document.getElementById("seeTeacher");
var couTable = document.getElementById("seeCourse");

// Image--------
var bg_img = document.getElementById("image");

function loginform(){
    login.style.transform="scale(1.0)";
}

// ********** Add Students function*************

// Show Student Form
function addstudents() {
    addStu.style.display = "block";
    addTea.style.display = "none";
    addCoursef.style.display = "none";
    
}

// Show Teacher Form
function addteachers(){
    addTea.style.display = "block";
    addStu.style.display = "none";
    addCoursef.style.display = "none";
}

// Show Add Course Form
function addcourse(){
    addCoursef.style.display = "block";
    addTea.style.display = "none";
    addStu.style.display = "none";
}


// Show hide all form
function formHide(){
    addStu.style.display="none";
    addTea.style.display = "none";
    addCoursef.style.display = "none";
}


// Show Student Table
function seestudentTable(){
    stuTable.style.display="block";
    teaTable.style.display="none";
    couTable.style.display="none";
    bg_img.style.display="none";
}

// Show Teacher Table
function seeteacherTable(){
    stuTable.style.display="none";
    teaTable.style.display="block";
    couTable.style.display="none";
    bg_img.style.display="none";
}

// Show Course Table
function seecourseTable(){
    stuTable.style.display="none";
    teaTable.style.display="none";
    couTable.style.display="block";
    bg_img.style.display="none";
}

// show Image on dblClick and Hide all table
function hideTable(){
    bg_img.style.display="block";
    stuTable.style.display="none";
    teaTable.style.display="none";
    couTable.style.display="none";
}

const stuDetails = () => {
    const stuName = document.getElementById("uname").value.trim();
    const stuEmail = document.getElementById('uemail').value.trim();
    const stuPhone = document.getElementById('uphone').value.trim();
    const stuDob = document.getElementById('udate').value;
    
    
    // name validation
    if (!isNaN(stuName)) {
        name_error.innerHTML = "**Please! enter the Alphabates**";
        return false
    }
    else{
        document.getElementById("name_error").innerHTML="";
    }
    

    // Regular expression for email validation
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!stuEmail.match(emailPattern)) {
        email_error.innerHTML = "**Invalid email address. Please enter a valid email**";
        return false
    } 
    else{
        document.getElementById("email_error").innerHTML="";
    }
    

    // phone no validation
    if(isNaN(stuPhone)){
        document.getElementById("phone_error").innerHTML="**please must write digits only not character**";
        return false;
    }
    else if(stuPhone.length!=10){
        document.getElementById("phone_error").innerHTML="**please phone no length must be 10 digits**";
        return false;
    } 
    else{
        document.getElementById("phone_error").innerHTML="";   
    }

    // date validation--------------
    if(stuDob == ""){
        document.getElementById("dob_error").innerHTML="**please select the Date**";
        return false;
    }
    else{
        document.getElementById("dob_error").innerHTML="";
    }


    // Gender validation
    const genderInputs = document.getElementsByName('gender');
    let selectedGender = false;

    for (const input of genderInputs) {
        if (input.checked) {
            selectedGender = true;
            break;
        }
    }

    // Perform radio button validation
    if (!selectedGender) {
        document.getElementById('gender_error').innerHTML="**Please! Select the Gender**"
        return false;
    }
    else{
        document.getElementById('gender_error').innerHTML="";
    }

    //Course Validation  
    
    // let courseInputs = document.getElementsByName('interested');
    // let selectCourse = false;

    // for (const input of courseInputs) {
    //     if (input.checked) {
    //         selectCourse = true;
    //         break;
    //     }
    // }

    // // Perform radio button validation
    // if (!selectCourse) {
    //     document.getElementById('course_error').innerHTML="**Please! Select the at least one course**"
    //     return false;
    // }
    // else{
    //     document.getElementById('course_error').innerHTML="";
    // }


}
