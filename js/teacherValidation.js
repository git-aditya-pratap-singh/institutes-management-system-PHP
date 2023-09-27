const teaDetails = () => {

    const stuName = document.getElementById("tname").value.trim();
    const stuEmail = document.getElementById('temail').value.trim();
    const stuPhone = document.getElementById('tphone').value.trim();
    const stuDob = document.getElementById('tdate').value;
    
    
    // name validation
    if (!isNaN(stuName)) {
        tname_error.innerHTML = "**Please! enter the Alphabates**";
        return false
    }
    else{
        document.getElementById("tname_error").innerHTML="";
    }
    

    // Regular expression for email validation
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!stuEmail.match(emailPattern)) {
        temail_error.innerHTML = "**Invalid email address. Please enter a valid email**";
        return false
    } 
    else{
        document.getElementById("temail_error").innerHTML="";
    }
    

    // phone no validation
    if(isNaN(stuPhone)){
        document.getElementById("tphone_error").innerHTML="**please must write digits only not character**";
        return false;
    }
    else if(stuPhone.length!=10){
        document.getElementById("tphone_error").innerHTML="**please phone no length must be 10 digits**";
        return false;
    } 
    else{
        document.getElementById("tphone_error").innerHTML="";   
    }

    // date validation--------------
    if(stuDob == ""){
        document.getElementById("tdob_error").innerHTML="**please select the Date**";
        return false;
    }
    else{
        document.getElementById("tdob_error").innerHTML="";
    }


    // Gender validation
    const genderInputs = document.getElementsByName('tgender');
    let selectedGender = false;

    for (const input of genderInputs) {
        if (input.checked) {
            selectedGender = true;
            break;
        }
    }

    // Perform radio button validation
    if (!selectedGender) {
        document.getElementById('tgender_error').innerHTML="**Please! Select the Gender**"
        return false;
    }
    else{
        document.getElementById('tgender_error').innerHTML="";
    }

    //Course Validation  
    
    // let courseInputs = document.getElementsByName('tinterested');
    // let selectCourse = false;

    // for (const input of courseInputs) {
    //     if (input.checked) {
    //         selectCourse = true;
    //         break;
    //     }
    // }

    // // Perform radio button validation
    // if (!selectCourse) {
    //     document.getElementById('tcourse_error').innerHTML="**Please! Select the at least one course**"
    //     return false;
    // }
    // else{
    //     document.getElementById('tcourse_error').innerHTML="";
    // }


}
